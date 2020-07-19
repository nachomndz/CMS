<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;




/** @test */

class Formularios_A_BD_test extends TestCase
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
     * A basic feature test example.
     *
     * @return void
     */

        /** @test */
       
   /* public function testRegistro()
    {
       
        
        /*$this->visit('register')
        ->type('NombrePrueba', 'name')
        ->type('email@prueba.com', 'email')
        ->type('contraseñadeprueba','password')
        ->type('contraseñadeprueba','password_confirmation')
        ->type('640065252','telefono');*/

     /*$this->post('register',[
            'name' => 'nombreprueba',
            'email' => 'email@prueba.com',
         
            'password' => 'passdeprueba',
            'telefono' => '640065252',
            'perfil_id' => '1'
          

          

    ]);
    
  $this->assertCredentials([
        'name' => 'nombreprueba',
        'email' => 'email@prueba.com',

        'password' => 'passdeprueba',
        'telefono' => '640065252',
        'perfil_id' => '1'
]);
          
/*
$this->assertDatabaseHas('users', [
    'name' => 'nombreprueba',
    'email' => 'email@prueba.com',

]);   



}
*/
  


/** @test */

public function login_autentica_y_redirige_usuario()
{


 
        $user = Formularios_A_BD_test::usuarioEditor();

        $response = $this->actingAs($user)->get(route('home'));

        $response->assertStatus(200);
    }


/** @test */

public function login_dispara_errores_devalidacion()
{
    $response = $this->post(route('login'), []);

    $response->assertStatus(302);
    $response->assertSessionHasErrors('email');
}
      /** @test */

/*public function registra_crea_y_loguea_un_user()
{
    $response = $this->post(route('register'), [
        'name' => 'Prueba',
        'email' => 'prueba@example.com',
        'password' => '123456',
        'password_confirmation' => '123456',
        'telefono' => '640065252'
    ]);

    $response->assertRedirect(route('home'));


}

*/

/*
public function register_creates_and_authenticates_a_user()
{
    $this->browse(function ($browser) {           
        $browser->visit('/register')              
            ->assertSee('Register')               
            ->type('name', 'Webber Wang')         
            ->type('email', 'email@gmail.com') 
            ->type('password', 'password')        
            ->press('Register')                   
            ->assertDatabaseHas('users', ['email => 'email@gmail.com']);
    });  

    
}
*/

      /** @test */
/*

public function envia_microcontenidos_a_la_BD(){


    $response = $this->post(route('newsEdit'), [
        'tipo' => 'Economia',
        'titulo' => 'Conferencia de la ONU',
        'subtitulo' => 'muy divertida',
        'texto' => 'siempre dicen cosas muy chulas',
        'autor' => 'fernando simon',
        'comienza' => '2020-07-16 17:31:55',
        'caduca' => '2020-07-20 17:31:55'
    ]);


    $response->assertDatabaseHas('users'[

        'tipo' => 'Economia',
        'titulo' => 'Conferencia de la ONU',
        'subtitulo' => 'muy divertida',
        'texto' => 'siempre dicen cosas muy chulas',
        'autor' => 'fernando simon',
        'comienza' => '2020-07-16 17:31:55',
        'caduca' => '2020-07-20 17:31:55'
    
        ]);

    }
*/



public function usuario_administrador_introduce_newsEdit(){

    $user= Formularios_A_BD_test::usuarioEditor();

    $this->actingAs($user);

//$this->post(route('newsEdit'), [


    $this->visit('/newsEdit')
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

$this->assertDatabaseHas('microcontenidos',[
    'texto' => 'Prueba Texto'
]);
    
}




  /** @test */
  public function the_email_is_required_for_authenticate()
  {
     // $user = Formularios_A_BD_test::usuarioAdministrador();
      $credentials = [
          "email" => null,
          "password" => "secret"
      ];

      $response = $this->from('/login')->post('/login', $credentials);
      $response->assertRedirect('/login')->assertSessionHasErrors([
          'email' => 'The email field is required.',
      ]);
  }

}