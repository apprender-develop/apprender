<?php

namespace App\Http\Controllers;

use App\Evaluacion_Plataforma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalificarController extends Controller
{
    public function calificar(Request $request)
    {
        $mEvaluacion_Plataforma = new Evaluacion_Plataforma;
        $this->delete(Auth::user()->id);
        $mEvaluacion_Plataforma->create([
            'user_id' => Auth::user()->id,
            'contenido' => $request->input('evalua_contenido', 0),
            'facil' => $request->input('evalua_facil', 0),
            'grafico' => $request->input('evalua_graficos', 0),
            'interactivo' => $request->input('evalua_interactivo', 0),
            'intuitivo' => $request->input('evalua_intuitivo', 0)
        ]);

        if ($request->ajax()) {
            $jsonResponse = [
                'data' => $request->all(),
                'user' => Auth::user()->nombreCompleto
            ];
            return response()->json($jsonResponse, 200);
        }

        return redirect()->back();
    }

    private function delete($user_id)
    {
        $mEvaluacion_Plataforma = new Evaluacion_Plataforma;
        return $mEvaluacion_Plataforma->where('user_id', $user_id)->delete();
    }
}
