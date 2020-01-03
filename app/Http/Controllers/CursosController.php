<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function show($curso_id)
    {
        return view("cursos.$curso_id.index");
    }

    public function unidad($curso_id, $unidad_id, $tema)
    {
        // dd("cursos.$curso_id.unidad$unidad_id.index");
        return view("cursos.$curso_id.unidad$unidad_id.index", compact('tema'));
    }
}
