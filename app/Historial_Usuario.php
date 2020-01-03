<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Historial_Usuario extends Model
{
    use SoftDeletes;

    protected $table = 'historial_usuarios';
    protected $fillable = ['user_id', 'accion_id', 'direccion_id', 'extra', 'evidenciable_id', 'evidenciable_type'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function evidenciable()
    {
        return $this->morphTo();
    }
}
