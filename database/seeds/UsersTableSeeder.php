<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $userRole = config('roles.models.role')::where('name', '=', 'User')->first();
        $adminRole = config('roles.models.role')::where('name', '=', 'Admin')->first();

        $permissions = config('roles.models.permission')::all();

        /*
         * Add Users
         *
         */
        if (config('roles.models.defaultUser')::where('email', '=', 'admin@admin.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Admin',
                'email'    => 'admin@admin.com',
                'password' => bcrypt('password'),
                'telefono'=> '640065252',
                'perfil_id' => '1',
              
            ]);

            $newUser->attachRole($adminRole);
            foreach ($permissions as $permission) {
                $newUser->attachPermission($permission);
            }
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'user@user.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'User',
                'email'    => 'user@user.com',
                'password' => bcrypt('password'),
                'telefono'=> '640065252',
                'perfil_id' => '1',
         
            ]);

            $newUser;
            $newUser->attachRole($userRole);
        }


/*
DB::table('users')->insert([
            
    'name' => 'Admin',
    'email' => 'admin@admin.com',
    'password' => bcrypt('password'),
   
    'telefono' =>'640065252',
    'perfil_id' => '1',
  
]);*/

        DB::table('users')->insert([
            
            'name' => 'IgnacioEditor',
            'email' => 'editor@editor.com',
            'password' => bcrypt('password'),
           
            'telefono' =>'640065252',
            'perfil_id' => '1',
          
        ]);


        //El administrador va a ser a la vez editor (rol=4)
       App\User::find(1)->roles()->attach(4);



         //factoria usuarios con sus respectivos roles
          $MAX_USERS=40;

           $cantidad_roles=4;

    

           
        /*   * Establecemos el máximo de usuarios -> 40
           * y los IDs de los roles tabla .
           * La aleatoriedad de la elección vendrá dada gracias al empleo de
           *      array_rand() que escogerá entre los roles que van del 2 al 4 ,quitamos el 1
           * que es el de administrador...
           *           del rango obtenido, escoger 1 resultado que serán aleatorios.
           * Es decir, que todos los usuarios tendrán un rol excepto el Administrador , que abajo 
           * le asignamos un rol más el de Editor.
           
*/

       $usuario= factory(App\User::class, $MAX_USERS)->create()
        ->each(function($usuario) use ($cantidad_roles) {
            $usuario->roles()->attach(array_rand(array_flip(range(2, $cantidad_roles)), 1));


        });



   

        }

     


    }





   

