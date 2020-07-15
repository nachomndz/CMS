<?php

namespace Tests\Feature\Http\Controllers\comprobandoRutas;


use App\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class Rutas_SinBD_Test extends TestCase
{

    //este refresh sirve para si hacemos alguna modificacion 
    //en las tablas de la BD original
    //automáticamente se migren también en esta BD
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
    
    
    $user->roles()->attach(4);

    return $user;
     }

     public static function usuarioAdministrador(){

        DB::table('perfiles')->insert([
            'id' => 8,
            'puesto' => 'Becario',
          
        ]);
  
    
        DB::table('roles')->insert([
            'id'=>'1',
            'name'        => 'Admin',
                'slug'        => 'admin',
                'description' => 'Admin Role',
                'level'       => 5,
          
        ]);
    
    
    
    $user=factory(User::class)->create([
  
    'perfil_id'=>'8',
    
    ]);
    
    
    $user->roles()->attach(1);

    return $user;
     }
     




     public static function usuarioNormal(){

        DB::table('perfiles')->insert([
            'id' => 8,
            'puesto' => 'Becario',
          
        ]);
    
    
    
    $user=factory(User::class)->create([
  
    'perfil_id'=>'8',
    
    ]);
    
    
    return $user;

     }
   /** @test */
   
   public function ruta_login_devuelve_vista_auth_login()
   {


       $this->get('/login')
       ->assertStatus(200)
       ->assertViewIs('auth.login');
   }
   
    /** @test */
    public function ruta_newsEdit_devuelve_vista_newsEdit()
    {
    

     
$user=Rutas_SinBD_Test::usuarioEditor();
    $this->actingAs($user)->get('/newsEdit')
    ->assertStatus(200)
    ->assertViewIs('newsEdit');



}

    /** @test */

public function miArea_retorna_view_miarea(){

$user=Rutas_SinBD_Test::usuarioEditor();


$this->actingAs($user)->get('miarea')
->assertStatus(200)
->assertViewIs('miarea');
}

  /** @test */

public function ruta_noticias_devuelve_view_shownews(){

    $user=Rutas_SinBD_Test::usuarioNormal();
    
    
    $this->actingAs($user)->get('noticias')
    ->assertStatus(200)
    ->assertViewIs('shownews');
    }
    

  /** @test */

public function ruta_gestorUsuarios_devuelve_view_gestorUsuarios(){

        $user=Rutas_SinBD_Test::usuarioAdministrador();
        
        
        $this->actingAs($user)->get('gestorUsuarios')
        ->assertStatus(200)
        ->assertViewIs('gestorUsuarios');
        }



  /** @test */

  public function ruta_tagsEditor_devuelve_view_tagsEditor(){

    $user=Rutas_SinBD_Test::usuarioEditor();
    
    
    $this->actingAs($user)->get('tagsEditor')
    ->assertStatus(200)
    ->assertViewIs('tagsEditor');
    }



     /** @test */

  /*public function ruta_tagsEditor_devuelve_view_tagsEditor(){

    $user=RutasSinBDTest::usuarioEditor();
    
    
    $this->actingAs($user)->get('tagsEditor')
    ->assertStatus(200)
    ->assertViewIs('tagsEditor');
    }*/
}
