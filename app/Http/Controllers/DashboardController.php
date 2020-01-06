<?php

namespace App\Http\Controllers;

use App\Encuesta;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->mEncuesta = new Encuesta;
    }

    public function index()
    {
        $apna = $this->mEncuesta->apna();
        $apna = json_encode($apna);
        return view('dashboard.index', compact('apna'));
    }
}
