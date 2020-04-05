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
            'name' => 'Informática',
          
        ]);


        DB::table('tags')->insert([
            'id' => 2,
            'name' => 'Ocio',
          
        ]);


        DB::table('tags')->insert([
            'id' => 3,
            'name' => 'Animales',
          
        ]);


        DB::table('tags')->insert([
            'id' => 4,
            'name' => 'Videojuegos',
          
        ]);

        DB::table('tags')->insert([
            'id' => 5,
            'name' => 'Deportes',
          
        ]);
    }
}
