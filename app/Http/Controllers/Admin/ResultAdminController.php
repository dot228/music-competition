<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultAdminController extends Controller
{
    public function index()
    {
        $results = Result::orderBy('category')
            ->orderByRaw("FIELD(award, 'grand_prix', 'laureate_1', 'laureate_2', 'laureate_3', 'diploma', 'special')")
            ->paginate(30);

        return view('admin.results.index', compact('results'));
    }

    public function create()
    {
        return view('admin.results.form', ['result' => new Result()]);
    }

    public function store(Request $request)
    {
        Result::create($this->validated($request));

        return redirect()->route('admin.results.index')->with('success', 'Результат додано.');
    }

    public function edit(Result $result)
    {
        return view('admin.results.form', compact('result'));
    }

    public function update(Request $request, Result $result)
    {
        $result->update($this->validated($request));

        return redirect()->route('admin.results.index')->with('success', 'Результат оновлено.');
    }

    public function destroy(Result $result)
    {
        $result->delete();

        return redirect()->route('admin.results.index')->with('success', 'Результат видалено.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'category' => ['required', 'in:' . implode(',', array_keys(Application::SPECIALTIES))],
            'award' => ['required', 'in:' . implode(',', array_keys(Result::AWARDS))],
            'participant_name' => ['required', 'string', 'max:255'],
            'work_title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
        ]);
    }
}
