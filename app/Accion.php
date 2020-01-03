<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accion extends Model
{
    use SoftDeletes;

    protected $table = 'acciones';
    protected $fillable = ['nombre'];
    protected $dates = ['created_at', 'updated_at'];
}
