<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
      public function index()
    {
        return view('profile.contact');  // Update the view path to 'profile.about' if needed
    }
}