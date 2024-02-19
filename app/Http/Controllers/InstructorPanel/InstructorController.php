<?php

namespace App\Http\Controllers\InstructorPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index()
    {
        return view('instructor.dashboard');
    }
}
