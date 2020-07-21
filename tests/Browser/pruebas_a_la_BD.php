<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
class pruebas_a_la_BD extends DuskTestCase
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
     * A Dusk test example.
     *
     * @return void
     */

/*
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSeeTitle('Laravel');
        });
    }
*/


/** @test */

/*
    public function testusuario_administrador_introduce_newsEdit(){

       
    
        $this->browse(function (Browser $browser) {

            $user= pruebas_a_la_BD::usuarioEditor();
        $browser->actingAs($user);
    
    //$this->post(route('newsEdit'), [
    
    
        $browser->visit('/newsEdit')
        ->type('tipo' ,'Economia')
        ->type('titulo' , 'Prueba titulo')
        ->type('texto' , 'Prueba Texto')
        ->type('autor' , 'Autorprueba')
        ->type('comienza' ,'2020-07-16 17:31:55')
        ->type('caduca' , '2020-07-19 17:31:55')
        ->press('crear');
    
    /*
        $this->visit('register')
        ->type(
        'tipo' => 'Economia')
        'titulo' => 'Prueba titulo',
        'subtitulo' => 'Prueba subtitulo',
        'texto' => 'Prueba Texto',
        'autor' => 'Autorprueba',
        'comienza' => '2020-07-16 17:31:55',
        'caduca' => '2020-07-19 17:31:55'
    
    ]);*/
    /*
    $browser->assertDatabaseHas('microcontenidos',[
        'texto' => 'Prueba Texto'
    ]);
        
    });
    


}
*/


public function test_crea_una_completando_formulario()
{

  // $crea=Formularios_A_BD_test::usuarioEditor();
   
  // $this->withoutExceptionHandling();

   $user=ExampleTest::usuarioEditor();

   $this->browse(function ($browser) use ($user) {
    $browser->actingAs($user)->visit('/almacenaPorTag')
   ->select('Economía','tipo')
   ->type('La empresa se acoge a un ERTE', 'titulo' )
   ->type('es una desgracia para todos', 'subtitulo')
   ->type('Esperemos recuperarnos y salir reforzados','texto')
   ->type('Robin Sharma','autor')
   ->select('Coronavirus','multiselect[]')
   ->type('07/01/2020','comienza')
   ->type('07/01/2020','caduca')

   ->press('submitNoticia');
   });
   
    //comprobamos que existe una noticia con ese titulo y subtitulo
    $this->assertDatabaseHas('microcontenidos',[
        'titulo' => 'La empresa se acoge a un ERTE',
        'subtitulo' => 'es una desgracia para todos'
        
    ]);

    }



}