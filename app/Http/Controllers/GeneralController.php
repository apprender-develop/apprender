<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    public function vestir()
    {
        return view('iframe.unidad2.vestir');
    }

    public function welcome()
    {
        if (Auth::user() != null) {
            return redirect()->route('home');
        }
        return view('auth.register');
    }
}
