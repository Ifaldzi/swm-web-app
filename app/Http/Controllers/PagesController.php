<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homePage()
    {
        return view('index');
    }

    public function RuteTercepat()
    {
        return view('RuteTercepat');
    }

    public function LogSampah()
    {
        return view('LogSampah');
    }
}
