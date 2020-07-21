<?php

namespace Tests\Feature;

use App\Microcontenido;
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
    

        DB::table('tags')->insert([
            'id' => '1',
            'name' => 'Futuros proyectos',
          
        ]);

        DB::table('tags')->insert([
            'id' => '2',
            'name' => 'Coronavirus',
          
        ]);
    
    $user=factory(User::class)->create([
    'id'=>1,
    'perfil_id'=>'8',
    
    ]);

    User::find(1)->tags()->attach(1);
    
    
    return $user;

    

    }


    public static function creacionContenidoyUser(){


        DB::table('microcontenidos')->insert([
            'id' => '1',
            'tipo' => 'Trabajo',
            'titulo' => 'Ayuda al Servicio de limpieza',
            'subtitulo' => 'Varias quejas de empleadas de la limpieza han sido recibidas', 
            'texto' =>'Se ruega más limpiez por parte de los trabajadores del Sector D',
            'path' => 'public/servicio-limpieza.jpg',

            'autor' => 'Jefe de mantenimiento',
            'comienza' => '2020-08-30',
            'caduca' => '2020-08-30',

            
        ]);

        DB::table('perfiles')->insert([
            'id' => 8,
            'puesto' => 'Becario',
          
        ]);
        $user=factory(User::class)->create([
            'id'=>1,
            'perfil_id'=>'8',
            
            ]);



            Microcontenido::find(1)->users()->attach(1);

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
public function registro_crea_a_usuario()
{

   $crea=Formularios_A_BD_test::usuarioEditor();
   $this->withoutExceptionHandling();
    $this->post('api/users', [
        'name' => 'Osvaldo',
        'email' => 'osvaldo@gmail.com',
        'password' => 'passdeprueba',
        'telefono' => '640065252',
        'perfil_id' => '8',

    ]);

    $this->assertDatabaseHas('users',[
        'name'=> 'Osvaldo',
        'email'=> 'osvaldo@gmail.com',
    ]);

    }


    /** @test */
/*public function crea_un_Tag()
{

  
    $this->post('/guardarTag', [
        'name' => 'Off-topic',
      

    ]);

    $this->assertDatabaseHas('tags',[
        'name'=> 'Off-topic',
        
    ]);

    }*/


        /** @test */
public function borrar_un_Tag()
{


    DB::table('tags')->insert([
        'id' => '1',
        'name' => 'Futuros proyectos',
      
    ]);
  
    $this->delete('tag/1');

    $this->assertDatabaseMissing('tags',[
        'name'=> 'Futuros Proyectos',
        
    ]);

    }


    public function test_ver_tags_de_usuario()
{


    $crea=Formularios_A_BD_test::usuarioEditor();

  
    $response= $this->get('get-tags/1');

    $response->assertStatus(200);

    }



    public function test_ocultación_de_microcontenido()
    {
    
    
        $creaUseryMicrocontenido=Formularios_A_BD_test::creacionContenidoyUser();
    
        //$user_id=$creaUseryMicrocontenido->id;

        $response= $this->get('ocultarNew/1/1');
    
        $response->assertStatus(200);
    
        }
    
    



    /** @test */
    /*
    public function crea_una_noticia()
    {
    
      // $crea=Formularios_A_BD_test::usuarioEditor();
       
       $this->withoutExceptionHandling();
        
       
       $this->post('almacenaPorTag', [
            'tipo' => 'Economía',
            'titulo' => 'La empresa se acoge a un ERTE',
            'subtitulo' => 'es una desgracia para todos',
            'texto' => 'Esperemos recuperarnos y salir reforzados',
            'autor' => 'Robin Sharma',
            'comienza' => '07/01/2020',
            'caduca' => '07/01/2020'
          
    
        ]);
    
        //comprobamos que existe una noticia con ese titulo y subtitulo
        $this->assertDatabaseHas('microcontenidos',[
            'titulo' => 'La empresa se acoge a un ERTE',
            'subtitulo' => 'es una desgracia para todos'
            
        ]);
    

      

        }
*/

 /** @test */
    
  /*  public function crea_una_completando_formulario()
    {
    
      // $crea=Formularios_A_BD_test::usuarioEditor();
       
       $this->withoutExceptionHandling();

       $user=Formularios_A_BD_test::usuarioEditor();
       $this->actingAs($user)->visit('/almacenaPorTag')
       ->select('Economía','tipo')
       ->type('La empresa se acoge a un ERTE', 'titulo' )
       ->type('es una desgracia para todos', 'subtitulo')
       ->type('Esperemos recuperarnos y salir reforzados','texto')
       ->type('Robin Sharma','autor')
       ->select('Coronavirus','multiselect[]')
       ->type('07/01/2020','comienza')
       ->type('07/01/2020','caduca')

       ->press('submitNoticia');

       
        //comprobamos que existe una noticia con ese titulo y subtitulo
        $this->assertDatabaseHas('microcontenidos',[
            'titulo' => 'La empresa se acoge a un ERTE',
            'subtitulo' => 'es una desgracia para todos'
            
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

/*
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
    ->press('crear');*/

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
$this->assertDatabaseHas('microcontenidos',[
    'texto' => 'Prueba Texto'
]);
    
}*/




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