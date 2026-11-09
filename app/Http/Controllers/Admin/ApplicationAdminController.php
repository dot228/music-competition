<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApplicationResultMail;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ApplicationAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Application::with('user')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        if ($request->filled('specialty')) {
            $query->where('specialty', $request->string('specialty'));
        }

        $applications = $query->paginate(20)->withQueryString();

        return view('admin.applications.index', compact('applications'));
    }

    public function show(Application $application)
    {
        return view('admin.applications.show', compact('application'));
    }

    public function downloadAgeDocument(Application $application)
    {
        abort_unless($application->age_document && Storage::disk('local')->exists($application->age_document), 404);

        return Storage::disk('local')->download($application->age_document);
    }

    public function update(Request $request, Application $application)
    {
        $data = $request->validate([
            'status' => ['required', 'in:' . implode(',', array_keys(Application::STATUSES))],
            'admin_comment' => ['nullable', 'string', 'max:2000'],
        ]);

        $application->update($data);

        return back()->with('success', 'Заявку оновлено.');
    }

    public function sendResults()
    {
        $applications = Application::whereIn('status', ['approved', 'rejected'])
            ->whereNull('result_notified_at')
            ->get();

        $sent = 0;
        foreach ($applications as $application) {
            if ($this->notifyResult($application)) {
                $sent++;
            }
        }

        return back()->with('success', $sent > 0
            ? "Надіслано листів про результат: {$sent}."
            : 'Немає нових результатів для розсилки — усі вже сповіщені.');
    }

    public function sendResult(Application $application)
    {
        abort_unless($application->hasResult(), 404);

        if ($this->notifyResult($application)) {
            return back()->with('success', 'Лист про результат надіслано.');
        }

        return back()->with('success', 'Не вдалося надіслати лист. Перевірте налаштування пошти.');
    }

    private function notifyResult(Application $application): bool
    {
        try {
            Mail::to($application->email)->send(new ApplicationResultMail($application));
            $application->update(['result_notified_at' => now()]);

            return true;
        } catch (\Throwable $e) {
            Log::error('Не вдалося надіслати лист про результат заявки #' . $application->id . ': ' . $e->getMessage());

            return false;
        }
    }

    public function destroy(Application $application)
    {
        if ($application->age_document) {
            Storage::disk('local')->delete($application->age_document);
        }

        $application->delete();

        return redirect()->route('admin.applications.index')->with('success', 'Заявку видалено.');
    }
}
