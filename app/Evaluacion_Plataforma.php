<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluacion_Plataforma extends Model
{

    use SoftDeletes;

    protected $table = 'evaluacion_plataforma';
    protected $guarded = ['id'];
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];
}
