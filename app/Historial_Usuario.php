<?php

namespace App;

use App\Http\Controllers\Helpers\Fechas;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Historial_Usuario extends Model
{
    use SoftDeletes;

    protected $table = 'historial_usuarios';
    protected $fillable = ['user_id', 'accion_id', 'direccion_id', 'extra', 'terminal_id', 'current_url', 'method'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function evidenciable()
    {
        return $this->morphTo();
    }

    public function terminal()
    {
        return $this->belongsTo(Terminal::class, 'terminal_id');
    }

    public function fechaLeible()
    {
        $fecha = new Fechas;
        return $fecha->nueva($this->created_at, true);
    }
}
