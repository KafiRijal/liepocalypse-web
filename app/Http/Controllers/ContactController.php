<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $data = [
            'nama' => $request->fullName,
            'email' => $request->email,
            'pesan' => $request->message,
        ];

        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to('admin@liepocalypse.com', 'Admin Liepocalypse')
                ->subject('Pesan Baru dari Kontak Website');
        });

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}
