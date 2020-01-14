<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\Evaluacion_Plataforma;
use App\Historial_Usuario;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $caliTotal = 0;
        $caliPlataformaA = json_decode($caliPlataforma);

        foreach ($caliPlataformaA as $value) {
            $caliTotal += $value;
        }

        $caliTotal = $caliTotal / 50 * 10;

        // $hisUsr = $this->mHistorialUsuario->ingresoDiarioUsuarios();
        // dd($hisUsr);

        // NUEVOS USUARIOS POR MES
        $nubm_data = $this->usuariosPorMes();

        // CURSOS MAS VISITADOS
        $cmv = $this->cursosVisitados();
        // $cmv = $cmv['labels'];
        // dd($cmv);

        return view('dashboard.index', compact('apna', 'tur', 'caliPlataforma', 'nubm_data', 'cmv', 'caliTotal'));
    }

    public function cursosVisitados()
    {
        $selectRaw = 'COUNT(current_url) as total, current_url';
        $cmv = $this->mHistorialUsuario->select(DB::raw($selectRaw))
                ->where('current_url', 'like', '%unidad%')
                ->groupBy('current_url')
                ->orderBy('total', 'desc')
                ->limit(5)
                ->get();
        // dd($cmv);

        $labels = [];
        $total = [];
        foreach ($cmv as $row) {
            $curso = '';
            $exploded = explode('curso/', $row->current_url);
            // dd($exploded[1]);
            $curso .= explode('/', $exploded[1])[0];
            $exploded = explode('unidad/', $row->current_url);
            $curso .= '.' . explode('/', $exploded[1])[0];
            $exploded = explode('tema/', $row->current_url);
            $curso .= '.' . explode('/', $exploded[1])[0];
            $labels[] = $curso;
            $total[] = $row->total;
        }
        return [
            'labels' => $labels,
            'data' => $total
        ];
    }

    public function usuariosPorMes()
    {
        $nubm = $this->mUser->nuevosPorMes();
        $nubm_data['2020'] = [];
        foreach ($nubm as $row) {
            if (array_key_exists($row->year, $nubm_data)) {
                $nubm_data[$row->year][] = $row->total;
            } else {
                $nubm_data = [
                    $row->year => [$row->total]
                ];
            }
        }
        return $nubm_data;
    }

    public function caliPlataforma()
    {
        $evaluacion_plataforma = $this->mEvaluacionPlataforma->calificacion();
        $total_evaluaciones = $evaluacion_plataforma->count() * 10;
        // dd($total_evaluaciones);
        $caliPlataforma = [];

        if ($total_evaluaciones == 0) {
            $caliPlataforma[] = 0;
            $caliPlataforma[] = 0;
            $caliPlataforma[] = 0;
            $caliPlataforma[] = 0;
            $caliPlataforma[] = 0;
        } else {
            $caliPlataforma[] = $evaluacion_plataforma->first()->total_contenido / $total_evaluaciones * 10;
            $caliPlataforma[] = $evaluacion_plataforma->first()->total_facil / $total_evaluaciones * 10;
            $caliPlataforma[] = $evaluacion_plataforma->first()->total_grafico / $total_evaluaciones * 10;
            $caliPlataforma[] = $evaluacion_plataforma->first()->total_interactivo / $total_evaluaciones * 10;
            $caliPlataforma[] = $evaluacion_plataforma->first()->total_intuitivo / $total_evaluaciones * 10;
        }
        return json_encode($caliPlataforma);
    }
}
