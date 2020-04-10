<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MicrocontenidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //



         
        DB::table('microcontenidos')->insert([
            
            'tipo' => 'Fiesta',
            'titulo' => 'Fiestón en Amnesia',
            'subtitulo' => 'white clothes only',
           
            'texto' =>'¡ Fantástica fiesta, prepárate para la que se ve a armar !',
            'autor' => 'Antonio Escohotado',
            'comienza' => '2020-05-11',
            'caduca' => '2020-05-12',

            
        ]);




        DB::table('microcontenidos')->insert([
            
            'tipo' => 'Futbol',
            'titulo' => 'Partido juveniles',
            'subtitulo' => 'entrenamiento a las 8:00 en Mareo',
           
            'texto' =>' Carrera continua y test de cooper ',
            'autor' => 'El entrenador',
            'comienza' => '2020-08-24',
            'caduca' => '2020-08-24',

            
        ]);


    }
}
