<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Unicodeveloper\Identify\Facades\IdentifyFacade;

class SandboxController extends Controller
{
    public function index()
    {
        return view('sandbox.jona.index');
    }

    public function useragent()
    {
        return IdentifyFacade::device()->getName();
        // return Identify::browser()->getName();
    }
}
