<?php

namespace Tests\Feature\Http\Controllers\comprobandoRutas;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     /** @test */

 
   
     public function ruta_login_devuelve_vista_auth_login()
     {
   
         $this->get('/login')
         ->assertStatus(200)
         ->assertViewIs('auth.login');
     }
 


       

}
