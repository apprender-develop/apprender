<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function show()
    {
        view('cursos.index');
    }
}
