<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PerfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        DB::table('perfiles')->insert([
            'id' => 1,
            'puesto' => 'Directivo',
          
        ]);




        
        DB::table('perfiles')->insert([
            'id' => 2,
            'puesto' => 'Departamento de Finanzas',
          
        ]);

       

        DB::table('perfiles')->insert([
            'id' => 3,
            'puesto' => 'Departamento de Recursos Humanos',
          
        ]);

        DB::table('perfiles')->insert([
            'id' => 4,
            'puesto' => 'Departamento Comercial',
          
        ]);


        DB::table('perfiles')->insert([
            'id' => 5,
            'puesto' => 'Departamento de Marketing',
          
        ]);



        DB::table('perfiles')->insert([
            'id' => 6,
            'puesto' => 'Departamento Tecnológico',
          
        ]);


        DB::table('perfiles')->insert([
            'id' => 7,
            'puesto' => 'Servicios de Limpieza',
          
        ]);


        DB::table('perfiles')->insert([
            'id' => 8,
            'puesto' => 'Becario',
          
        ]);

     

/*

DB::table('perfiles')->insert([
    'id' => 1,
    'puesto' => 'Directivo',
  
]);





DB::table('perfiles')->insert([
    'id' => 2,
    'puesto' => 'Jugador',
  
]);



DB::table('perfiles')->insert([
    'id' => 3,
    'puesto' => 'Entrenador',
  
]);

DB::table('perfiles')->insert([
    'id' => 4,
    'puesto' => 'Familiar jugador',
  
]);


DB::table('perfiles')->insert([
    'id' => 5,
    'puesto' => 'Fisioterapeuta',
  
]);



DB::table('perfiles')->insert([
    'id' => 6,
    'puesto' => 'Community Manager',
  
]);
*/
/*
DB::table('perfiles')->insert([
    'id' => 7,
    'puesto' => 'Servicios de Limpieza',
  
]);


DB::table('perfiles')->insert([
    'id' => 8,
    'puesto' => 'Becario',
  
]);
*/


    }
}
