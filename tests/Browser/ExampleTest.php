<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;


use App\User;
use Faker\Factory;

class ExampleTest extends DuskTestCase
{ 





    use RefreshDatabase;




    /**
     * Select the given value or random value of a drop-down field.
     *
     * @param  string $field
     * @param $browser
     * @param array|null $values
     * @return $this
     * @internal param string $value
     */
    public function selectMultiple($field, $browser, $values = [])
    {
        $element = $browser->resolver->resolveForSelection($field);

        $options = $element->findElements(WebDriverBy::tagName('option'));

        if (empty($values)) {
            $maxSelectValues = sizeof($options) - 1;
            $minSelectValues = rand(0, $maxSelectValues);
            foreach (range($minSelectValues, $maxSelectValues) as $optValue) {
                $options[$optValue]->click();
            }
        } else {
            foreach ($options as $option) {
                $optValue = (string)$option->getAttribute('value');
                if (in_array($optValue, $values)) {
                    $option->click();
                }
            }
        }

        return $this;
    }
    
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




        /** @test */

        /*
    public function usuario_registrado_can_login(){

        DB::table('perfiles')->insert([
            'id' => 8,
            'puesto' => 'Becario',
          
        ]);
        factory(User::class)->create(['email' => 'nachoprueba@gmail.com',
                                        'perfil_id' => 8, ]
    
    );

        $this->browse(function (Browser $browser) {
            $browser->visit('login')
            ->type('#email','nachoprueba@gmail.com')
            ->type('#password','password')
            ->press('#login-btn')
            ->assertAuthenticated();
        });
    }*/

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function BasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }

    public function test_crea_una_completando_formulario()
    {
    
      // $crea=Formularios_A_BD_test::usuarioEditor();
       
      // $this->withoutExceptionHandling();
    
       $user=ExampleTest::usuarioEditor();
    
       $this->browse(function ($browser) use ($user) {
        $browser->visit('/almacenaPorTag')
        ->select('Economía','@tipo')
       ->type('La empresa se acoge a un ERTE', '@dtitulo' )
       ->type('es una desgracia para todos', '@dsubtitulo')
       ->type('Esperemos recuperarnos y salir reforzados','@dtexto')
       ->type('Robin Sharma','@dautor')
       ->selectMultiple("multiselect[]", $browser, ["Coronavirus"])
     ->type('07/01/2020','@dcomienza')
       ->type('07/01/2020','@caduca')
    
       ->press('submitNoticia');
       });
       
        //comprobamos que existe una noticia con ese titulo y subtitulo
        $this->assertDatabaseHas('microcontenidos',[
            'titulo' => 'La empresa se acoge a un ERTE',
            'subtitulo' => 'es una desgracia para todos'
            
        ]);
    
        }





/*
    public function usuario_administrador_introduce_newsEdit(){

        $user= ExampleTest::usuarioEditor();

   
        $this->browse(function (Browser $browser) use ($user) {
          //  $browser->dump();
        $browser->loginAs($user);
    
    //$this->post(route('newsEdit'), [
    
    
        $browser->visit('/newsEdit')
        ->type('#texto' , 'Prueba Texto')
        ->type('#titulo' , 'Prueba titulo')
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
    


}*/
}
