<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tags')->insert([
            'id' => 1,
            'name' => 'Reuniones Informativas',
          
        ]);


        DB::table('tags')->insert([
            'id' => 2,
            'name' => 'Finanzas',
          
        ]);


        DB::table('tags')->insert([
            'id' => 3,
            'name' => 'Marketing',
          
        ]);


        DB::table('tags')->insert([
            'id' => 4,
            'name' => 'Expansión',
          
        ]);

        DB::table('tags')->insert([
            'id' => 6,
            'name' => 'Team-Building',
          
        ]);


        DB::table('tags')->insert([
            'id' => 7,
            'name' => 'Networking',
          
        ]);



        DB::table('tags')->insert([
            'id' => 8,
            'name' => 'Coronavirus',
          
        ]);



        DB::table('tags')->insert([
            'id' => 9,
            'name' => 'Infraestructura de red',
          
        ]);


        DB::table('tags')->insert([
            'id' => 10,
            'name' => 'Servicios de limpieza',
          
        ]);


        DB::table('tags')->insert([
            'id' => 11,
            'name' => 'Futuros proyectos',
          
        ]);

        DB::table('tags')->insert([
            'id' => 12,
            'name' => 'Planificación de crecimiento',
          
        ]);



    }
}
