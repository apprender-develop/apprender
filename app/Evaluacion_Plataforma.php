<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Evaluacion_Plataforma extends Model
{

    use SoftDeletes;

    protected $table = 'evaluacion_plataforma';
    protected $guarded = ['id'];
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function calificacion()
    {
        $sql = $this->select(DB::raw('SUM(contenido) as total_contenido, SUM(facil) as total_facil, SUM(grafico) as total_grafico, SUM(interactivo) as total_interactivo, SUM(intuitivo) as total_intuitivo'));
        return $sql;
    }
}
