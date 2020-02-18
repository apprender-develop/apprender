<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Controllers\Helpers\Fechas;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombreCompleto', 'pseudoficha', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function historial()
    {
        return $this->hasMany(Historial_Usuario::class, 'user_id');
    }

    public function fechaLeible($column_name = null)
    {
        $date = $column_name === null ? $this->created_at : $this->{$column_name};
        // dd($date);
        $fecha = new Fechas;
        return $fecha->nueva($date, true);
    }

    public function clientes()
    {
        return $this->whereHas("roles", function($q){ $q->where("name", "cliente"); });
    }

    public function nuevosPorMes()
    {
        $datedbraw = 'count(`id`) as total, DATE_FORMAT(created_at, "%m") as mes, DATE_FORMAT(created_at, "%Y") as year';
        return $this->whereHas("roles", function($q){ $q->where("name", "cliente"); })->select(DB::raw($datedbraw))->groupBy('mes', 'year')->get();
    }
}
