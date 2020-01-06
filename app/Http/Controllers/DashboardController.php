<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\Evaluacion_Plataforma;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->mEncuesta = new Encuesta;
        $this->mUser = new User;
        $this->mEvaluacionPlataforma = new Evaluacion_Plataforma;
    }

    public function index()
    {
        $apna = $this->mEncuesta->apna();
        $apna = json_encode($apna);

        $tur = $this->mUser->clientes()->count();

        $caliPlataforma = $this->caliPlataforma();

        return view('dashboard.index', compact('apna', 'tur', 'caliPlataforma'));
    }

    public function caliPlataforma()
    {
        $evaluacion_plataforma = $this->mEvaluacionPlataforma->calificacion();
        $total_evaluaciones = $evaluacion_plataforma->count() * 10;
        // dd($total_evaluaciones);
        $caliPlataforma = [];

        $caliPlataforma[] = $evaluacion_plataforma->first()->total_contenido / $total_evaluaciones * 10;
        $caliPlataforma[] = $evaluacion_plataforma->first()->total_facil / $total_evaluaciones * 10;
        $caliPlataforma[] = $evaluacion_plataforma->first()->total_grafico / $total_evaluaciones * 10;
        $caliPlataforma[] = $evaluacion_plataforma->first()->total_interactivo / $total_evaluaciones * 10;
        $caliPlataforma[] = $evaluacion_plataforma->first()->total_intuitivo / $total_evaluaciones * 10;
        return json_encode($caliPlataforma);
    }
}
