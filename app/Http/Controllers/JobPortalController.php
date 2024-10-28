<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobPortalController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function jobListings()
    {
        return view('job-listings');
    }

    public function about()
    {
        return view('about');
    }
    
}
