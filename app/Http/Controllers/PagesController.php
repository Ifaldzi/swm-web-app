<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homePage()
    {
        return view('index');
    }

    public function registration()
    {
        return view('registration');
    }

    public function addTempatSampah()
    {
        return view('addTempatSampah');
    }

    public function addTruk()
    {
        return view('addTruk');
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
