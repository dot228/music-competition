<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'topic' => ['required', 'in:' . implode(',', array_keys(ContactMessage::TOPICS))],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'message' => ['required', 'string', 'max:5000'],
            'agree_privacy' => ['required', 'accepted'],
        ]);

        $contactMessage = ContactMessage::create($data);

        try {
            Mail::to(['richterschool.zt@ukr.net', 'kylt@zt-rada.gov.ua'])->send(new ContactMessageMail($contactMessage));
        } catch (\Throwable $e) {
            Log::error('Не вдалося надіслати лист-звернення #' . $contactMessage->id . ': ' . $e->getMessage());
        }

        return redirect()->route('contacts')->with('success', 'Дякуємо! Ваше звернення отримано. Ми відповімо найближчим часом.');
    }
}
