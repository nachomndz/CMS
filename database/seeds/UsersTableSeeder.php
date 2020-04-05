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
                /*'telefono '=> '640065252',*/
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
             /*   'telefono '=> '640065252',*/
            ]);

            $newUser;
            $newUser->attachRole($userRole);
        }



        
        DB::table('users')->insert([
            
            'name' => 'IgnacioEditor',
            'email' => 'editor@editor.com',
            'password' => bcrypt('password'),
           
            'telefono' =>'640065252',
            'perfil_id' => '1',
          
        ]);
    }
}
