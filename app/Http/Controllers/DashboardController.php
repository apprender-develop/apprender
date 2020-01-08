<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\Evaluacion_Plataforma;
use App\Historial_Usuario;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->mEncuesta = new Encuesta;
        $this->mUser = new User;
        $this->mEvaluacionPlataforma = new Evaluacion_Plataforma;
        $this->mHistorialUsuario = new Historial_Usuario;
    }

    public function index()
    {
        $apna = $this->mEncuesta->apna();
        $apna = json_encode($apna);

        $tur = $this->mUser->clientes()->count();

        $caliPlataforma = $this->caliPlataforma();

        // $hisUsr = $this->mHistorialUsuario->ingresoDiarioUsuarios();
        // dd($hisUsr);

        // NUEVOS USUARIOS POR MES
        $nubm = $this->mUser->nuevosPorMes();
        $nubmd_years = [];
        $nubmd_data = [];
        foreach ($nubm as $row) {
            if (array_key_exists($row->year, $nubmd_data)) {
                $nubm_data[$row->year][] = $row->total;
            } else {
                $nubm_data = [
                    $row->year => [$row->total]
                ];
            }
        }
        // dd(json_encode($nubm_data[2020]));
        return view('dashboard.index', compact('apna', 'tur', 'caliPlataforma', 'nubm_data'));
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
