<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function editPassword()
    {
        return view('admin.password');
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ]);

        if (!Hash::check($data['current_password'], Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Поточний пароль указано невірно.']);
        }

        Auth::user()->update([
            'password' => Hash::make($data['password']),
        ]);

        return back()->with('success', 'Пароль успішно змінено.');
    }
}
