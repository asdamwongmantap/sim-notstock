<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //go to dashboard
    public function index()
    {
        return view('home');
    }
}
