<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function sendAjax(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = $request->only('name', 'email', 'message');

        // Kirim email
        Mail::to('youremail@gmail.com')->send(new ContactMail($data));

        return response()->json(['success' => true, 'message' => 'Pesan berhasil dikirim!']);
    }
}
