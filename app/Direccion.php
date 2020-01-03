<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direcciones';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];
}
