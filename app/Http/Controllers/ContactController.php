<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:255',
            'user_message' => 'required|string'
        ]);

        $content = [
            'email' => $request->email,
            'name' => $request->name,
            'message' => $request->user_message
        ];

        Mail::to('destination@example.com')->send(new ContactMail($content));

        return back()->with('message', 'Email send with success!');
    }
}
