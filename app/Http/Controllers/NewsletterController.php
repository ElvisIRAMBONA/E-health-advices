<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validate the email input
        $request->validate([
            'email' => 'required|email|unique:newsletters,email'
        ]);

        // Save email to the 'newsletters' table
        Newsletter::create(['email' => $request->email]);

        return redirect()->back()->with('success', 'Thank you for subscribing!');
    }
}