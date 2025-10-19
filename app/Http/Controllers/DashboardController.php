<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Method to load the SB Admin dashboard view
    public function index()
    {
        return view('layouts.dashboard');  // This returns resources/views/layouts/dashboard.blade.php
    }

    // Optional: Other methods like admin dashboard if needed
    public function dashboard()
    {
        return view('layouts.dashboard');
    }
}
