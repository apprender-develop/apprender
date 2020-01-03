<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [ 'email' => $request->email , 'password' => $request->password ];

        if(Auth::attempt($credentials)) {

        }
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        $jsonResponse = [
            'code' => 200,
            'msg' => 'Se cambio la contraseña correctamente.',
            'data' => $request->all(),
            'user' => $user
        ];
        return response()->json($jsonResponse,200);
    }
}
