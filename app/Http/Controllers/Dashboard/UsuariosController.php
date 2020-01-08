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

    public function index(Request $request)
    {
        $users = $this->mUser->whereHas("roles", function($q){ $q->where("name", "cliente"); });

        $qr = $request->input('query', null);

        if ($qr != null) {
            $users = $users->where(function($query) use ($qr) {
                    $query->orwhere('nombreCompleto', 'like', "%$qr%")
                        ->orwhere('email', 'like', "%$qr%")
                        ->orwhere('created_at', 'like', "%$qr%")
                        ->orwhere('pseudoficha', 'like', "%$qr%")
                        ->get();
                });
        }

        $users = $users->paginate(5);

        if ($request->ajax()) {
            return view('dashboard.usuarios._list', compact('users'));

        }
        return view('dashboard.usuarios.index', compact('users'));
    }

    public function show($user_id)
    {
        $user = $this->mUser->with('historial.terminal')->where('id', $user_id)->first();

        return view('dashboard.usuarios.show', compact('user'));
    }
}
