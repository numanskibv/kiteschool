<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalCource;

class CalCourceController extends Controller
{
    public function index()
    {
        $calCources = CalCource::all();
    }
}
