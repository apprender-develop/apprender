<?php

namespace App\Http\Controllers;

use App\Encuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EncuestaController extends Controller
{
    public function guardar(Request $request)
    {
        $mEncuesta = new Encuesta;
        $user_id = Auth::user()->id;
        $this->delete($user_id);

        $mEncuesta->create([
            'user_id' => $user_id,
            'aciertos' => $request->input('aciertos', 0),
            'total' => $request->input('total', 0),
            'calificacion' => $request->input('calificacion', 0),
        ]);

        $jsonResponse = [
            'data' => $request->all(),
            'user' => Auth::user()->nombreCompleto
        ];

        return response()->json($jsonResponse,200);
    }

    private function delete($user_id)
    {
        $mEncuesta = new Encuesta;
        return $mEncuesta->where('user_id', $user_id)->delete();
    }
}
