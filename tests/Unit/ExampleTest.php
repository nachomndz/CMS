<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class ExampleTest extends TestCase
{


    use RefreshDatabase;

    public static function usuarioEditor(){
        DB::table('perfiles')->insert([
            'id' => 8,
            'puesto' => 'Becario',
          
        ]);
    
        DB::table('roles')->insert([
            'id'  => '4',
            'name'        => 'Editor',
            'slug'        => 'editor',
            'description' => 'Editor Role',
            'level'       => 4,
          
        ]);
    
    
    $user=factory(User::class)->create([
  
    'perfil_id'=>'8',
    
    ]);
    return $user;

    

    }



    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }







}
