<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsuariosController extends Controller
{

    public function __construct()
    {
        $this->mUser = new User;
    }

    public function index()
    {
        $users = $this->mUser->whereHas("roles", function($q){ $q->where("name", "cliente"); })->get();
        return view('dashboard.usuarios.index', compact('users'));
    }

    public function show($user_id)
    {
        $user = $this->mUser->with('historial.terminal')->where('id', $user_id)->first();

        return view('dashboard.usuarios.show', compact('user'));
    }
}
