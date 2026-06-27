<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display the staff dashboard.
     */
    public function dashboard()
    {
        return view('staff.dashboard');
    }
}
