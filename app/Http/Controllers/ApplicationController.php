<?php

namespace App\Http\Controllers;

use App\Mail\ApplicationConfirmationMail;
use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function create()
    {
        return view('pages.apply');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'birth_date' => [
                'required',
                'date',
                'before:today',
                function ($attribute, $value, $fail) {
                    $age = Carbon::parse($value)->diffInYears(Carbon::parse('2027-02-26'));
                    if ($age < 10 || $age > 13) {
                        $fail('Учасник має бути віком від 10 до 13 років включно станом на дату очного туру (26.02.2027).');
                    }
                },
            ],
            'city' => ['required', 'string', 'max:255'],
            'institution' => ['required', 'string', 'max:255'],
            'study_year' => ['required', 'string', 'max:100'],
            'teacher_name' => ['required', 'string', 'max:255'],
            'specialty' => ['required', 'in:' . implode(',', array_keys(Application::SPECIALTIES))],
            'age_document' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:10240'],

            'piece1_composer' => ['required', 'string', 'max:255'],
            'piece1_title' => ['required', 'string', 'max:255'],
            'piece1_duration' => ['required', 'string', 'max:20'],
            'piece2_composer' => ['required', 'string', 'max:255'],
            'piece2_title' => ['required', 'string', 'max:255'],
            'piece2_duration' => ['required', 'string', 'max:20'],
            'program_duration' => ['required', 'string', 'max:20'],

            'video_link' => ['required', 'url', 'max:255'],
            'bio' => ['required', 'string', 'max:700'],

            'guardian_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:255'],

            'agree_rules' => ['required', 'accepted'],
            'agree_privacy' => ['required', 'accepted'],
            'agree_media' => ['required', 'accepted'],
        ]);

        $data['age_document'] = $request->file('age_document')->store('applications/age-documents', 'local');
        $data['user_id'] = $request->user()->id;

        $application = Application::create($data);

        try {
            Mail::to($application->email)
                ->cc('culturezhytomyr@gmail.com')
                ->send(new ApplicationConfirmationMail($application));
        } catch (\Throwable $e) {
            Log::error('Не вдалося надіслати лист-підтвердження заявки #' . $application->id . ': ' . $e->getMessage());
        }

        return redirect()->route('applications.my')->with(
            'success',
            "Заявку успішно подано! Реєстраційний номер: {$application->registrationNumber()}. Підтвердження надіслано на {$application->email} — якщо лист не надійде протягом 30 хвилин, перевірте папку «Спам» або зверніться до Організаційного комітету."
        );
    }

    public function my(Request $request)
    {
        $applications = $request->user()->applications()->latest()->get();

        return view('pages.my-applications', compact('applications'));
    }
}
