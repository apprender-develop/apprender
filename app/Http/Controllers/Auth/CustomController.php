<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [ 'email' => $request->email , 'password' => $request->password ];

        if(Auth::attempt($credentials)) {

        }
    }
}
