<?php

namespace App\Http\Controllers\ClientPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.dashboard');
    }
}
