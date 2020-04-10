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
            'puesto' => 'directivo',
          
        ]);


        DB::table('perfiles')->insert([
            'id' => 2,
            'puesto' => 'empleado',
          
        ]);

        DB::table('perfiles')->insert([
            'id' => 3,
            'puesto' => 'becario',
          
        ]);
    }
}
