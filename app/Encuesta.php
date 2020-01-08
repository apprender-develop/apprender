<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Encuesta extends Model
{
    use SoftDeletes;

    protected $table = 'encuesta';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function aprobados()
    {
        return $this->where('calificacion', '>', 6)->count();
    }

    public function noAprobados()
    {
        return $this->where('calificacion', '<=', 6)->count();
    }

    public function apna()
    {
        return [$this->aprobados(),$this->noAprobados()];
    }
}
