<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('profile.about');  // Update the view path to 'profile.about' if needed
    }
}