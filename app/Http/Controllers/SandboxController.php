<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SandboxController extends Controller
{
    public function index()
    {
        return view('sandbox.jona.index');
    }
}
