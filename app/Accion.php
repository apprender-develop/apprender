<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{

    protected $table = 'acciones';
    protected $fillable = ['nombre'];
    protected $dates = ['created_at', 'updated_at'];
}
