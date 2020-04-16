<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MicrocontenidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //



         
        DB::table('microcontenidos')->insert([
            
            'tipo' => 'Ocio',
            'titulo' => 'Cena de empresa',
            'subtitulo' => 'Toda la plantilla de Alcorcón invitada',
           
            'texto' =>'¡ Esperemos que sea una tranquila velada. Ideal para favorecer el teambuilding !',
            'autor' => 'Antonio Escohotado',
            'comienza' => '2020-05-11',
            'caduca' => '2020-05-12',

            
        ]);




        DB::table('microcontenidos')->insert([
            
            'tipo' => 'Ocio',
            'titulo' => 'Sorteo 2 entradas final de champions ',
            'subtitulo' => 'Se sortearán entre toda la plantilla',
           
            'texto' =>'Será un sorteo entre toda la plantilla mucha suerte a todos los miembros de la empresa',
            'autor' => 'El CEO, Ramón',
            'comienza' => '2020-08-24',
            'caduca' => '2020-08-24',

            
        ]);




        DB::table('microcontenidos')->insert([
            
            'tipo' => 'Trabajo',
            'titulo' => 'Reunión becarios ',
            'subtitulo' => 'Sala principal del edificio Oeste',
           
            'texto' =>'Se darán todas las indicaciones a nuestros becarios para que sepan como proceder en días venidores',
            'autor' => 'La ejecutiva',
            'comienza' => '2020-08-28',
            'caduca' => '2020-08-28',

            
        ]);

        DB::table('microcontenidos')->insert([
            
            'tipo' => 'Recortes',
            'titulo' => 'Recorte en sueldos de la plantilla ejecutiva',
            'subtitulo' => 'Sortearemos las dificultades juntos',
           
            'texto' =>'Será necesario afrontar la crisis del coronavirus todos juntos, la cúpula dará ejemplo',
            'autor' => 'La ejecutiva',
            'comienza' => '2020-08-29',
            'caduca' => '2020-08-29',

            
        ]);
        DB::table('microcontenidos')->insert([
            
            'tipo' => 'Trabajo',
            'titulo' => 'Ayuda al Servicio de limpieza',
            'subtitulo' => 'Varias quejas de empleadas de la limpieza han sido recibidas',
           
            'texto' =>'Se ruega más limpiez por parte de los trabajadores del Sector D',
            'autor' => 'Jefe de mantenimiento',
            'comienza' => '2020-08-30',
            'caduca' => '2020-08-30',

            
        ]);


        DB::table('microcontenidos')->insert([
            
            'tipo' => 'Trabajo',
            'titulo' => 'Reparación de la infraestructura de red',
            'subtitulo' => 'Será arreglada próximamente',
           
            'texto' =>'Las caídas continuadas de la red serán arregladas en los próximos días se ruega paciencia a todos los trabajadores',
            'autor' => 'CTO',
            'comienza' => '2020-08-30',
            'caduca' => '2020-08-30',

            
        ]);




        App\Microcontenido::find(1)->users()->attach(1);   
        App\Microcontenido::find(2)->users()->attach(1);




        $usuarios= App\User::all();

        // $usuarios_id=$usuarios->id;
  
  

        $tags=App\Tag::all();

         foreach($usuarios as $usuario){
             
  
  
              $usuario->tags()->attach(mt_rand(1, 12));
  
    }

/*
    foreach($tags as $tag){
             
  
  
        $tag->users()->attach(mt_rand(1, 40));

}
*/
}
}