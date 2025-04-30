<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function contact(Request $request)
    {
        $validated = $request->validate(['fullName' => 'required|string', 'email' => 'required|string|email', 'subject' => 'required|string', 'message' => 'required|string',]);

        Mail::raw("
                 You have received a new contact message:
                 Name: {$validated['fullName']}
                 Email: {$validated['email']}
                 Message: {$validated['message']}
                 Regards.", function ($message) use ($validated) {
            $message->to(env('MAIL_USERNAME'))->subject("{$validated['subject']}");
        });

        return redirect()->back()->with('success', 'Thanks for contacting us!');
    }
}
