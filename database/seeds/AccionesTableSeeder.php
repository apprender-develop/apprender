<?php

use App\Accion;
use Illuminate\Database\Seeder;

class AccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = new Accion;

        $datos = [
            ['nombre' => 'Inicio de sesión'],
            ['nombre' => 'Cierre de sesión'],
            ['nombre' => 'Ingreso a página']
        ];

        foreach ($datos as $dato) {
            $model->firstorcreate($dato);
        }
    }
}
