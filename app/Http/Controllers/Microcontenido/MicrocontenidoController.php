<?php

namespace App\Http\Controllers\Microcontenido;

use App\Http\Controllers\Controller;
use App\Http\Controllers\metodosController;
use App\Http\Controllers\User\UserController;
use App\Microcontenido;
use Illuminate\Http\Request;

class MicrocontenidoController extends Controller
{



  //  protected $redirectTo = '/newsEdit';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     
        $microcontenidos= Microcontenido::all();
        return $microcontenidos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
        //return $request;
        
      
        //$request->json_encode('noticia');

        $validatedData = $request->validate([
            'tipo' => 'required|max:255',
            'titulo' => 'required|max:255',
            'subtitulo' => 'required|max:255',
            'texto' => 'required|max:255',
            'autor' => 'required|max:255',
            'comienza' => 'required|date',
            'caduca' => 'required|date',
          
        ]);



        $microcontenidos = new Microcontenido;   

        $microcontenidos->tipo = $request->tipo;
        $microcontenidos->titulo = $request->titulo;
        $microcontenidos->subtitulo = $request->subtitulo;
        $microcontenidos->texto = $request->texto;

        //$microcontenidos->multiselect = $request->multiselect;

        $microcontenidos->autor = $request->autor;
        $microcontenidos->comienza = $request->comienza;
        $microcontenidos->caduca = $request->caduca;

        $microcontenidos->save();

    

//saco el numero de elementos
//convierto string separado por comas a array
//$array = explode(",", $request->user);
//saco su longitud

//usar para quitar repetidos array_unique(array)



$lista_de_ids=[];
$array=$request->multiselect;
/*
if(!is_numeric($array[0])   ){


   array_push($lista_de_ids,UserController::obtenerIdsPorPerfil($array[0]));
    

}


if(!is_numeric($array[1])   ){

    array_push($lista_de_ids,UserController::obtenerIdsPorPerfil($array[1]));

}

if(!is_numeric($array[2])   ){

    array_push($lista_de_ids,UserController::obtenerIdsPorPerfil($array[2]));
}
*/

//retocar


for ($h=0; $h<count($array); $h++) {

    if(!is_numeric($array[$h]))
    array_push($lista_de_ids,UserController::obtenerIdsPorPerfil($array[$h]));

    }
    

 //return $lista_de_ids;

$repetidos=array_merge($array,$lista_de_ids);



//$lista_de_ids=array_unique($array,$lista_de_ids);

$lista_de_ids=array_unique($repetidos);




    # code...
//return $lista_de_ids;
//$uniendo_arrays = array_merge($lista_de_ids[$i]);
//}
//$longitud = count($lista_de_ids);

//Recorro todos los elementos
//return $lista_de_ids;

$comienzo=count($array);

//return $comienzo;
for ($i=$comienzo; $i <count($lista_de_ids) ; $i++) { 
   
   // for($j=0; $j<count($lista_de_ids[$i]); $j++)
   for($j=0; $j<count($lista_de_ids[$i]); $j++)
   
      {
      //saco el valor de cada elemento
      echo $lista_de_ids[$i][$j].'<br>';





$microcontenidos->users()->attach($lista_de_ids[$i][$j], ['opciones' => 'dirigido', 'visible' => 1]);


    }
    
    
    }
//FUNCIONAL
//$microcontenidos->users()->attach($request->user , ['opciones' => 'dirigido' , 'visible' => 1]); //['visible' => 1]);
      // User::find($request->user)->Microcontenido()->save($microcontenido, '')


      metodosController::redirect_now('/newsEdit');









        return response()->json($microcontenidos, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

       /* $microcontenidos= Microcontenido->;
        return $microcontenidos;
        
*/

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }





    public function almacena(Request $request)
    {
        //

       // $request->json_encode('noticia');

        
        $validatedData = $request->validate([
            'tipo' => 'required|max:255',
         

            'titulo' => 'required|max:255',
            'subtitulo' => 'required|max:255',
            'texto' => 'required|max:255',
            'autor' => 'required|max:255',
            'comienza' => 'required|date',
            'caduca' => 'required|date',
          
        ]);



        $microcontenidos = new Microcontenido();   

        $microcontenidos->tipo = $request->tipo;
        $microcontenidos->titulo = $request->titulo;
        $microcontenidos->subtitulo = $request->subtitulo;
        $microcontenidos->texto = $request->texto;
        $microcontenidos->autor = $request->autor;
        $microcontenidos->comienza = $request->comienza;
        $microcontenidos->caduca = $request->caduca;
   

        $microcontenidos->save();

        return response()->json( $microcontenidos, 201);

    }








    public function almacenaPorTag(Request $request)
    {
        //

       // $request->json_encode('noticia');

        
        $validatedData = $request->validate([
            'tipo' => 'required|max:255',
         

            'titulo' => 'required|max:255',
            'subtitulo' => 'required|max:255',
            'texto' => 'required|max:255',
            'autor' => 'required|max:255',
            'comienza' => 'required|date',
            'caduca' => 'required|date',
          
        ]);



        $microcontenidos = new Microcontenido();   

        $microcontenidos->tipo = $request->tipo;
        $microcontenidos->titulo = $request->titulo;
        $microcontenidos->subtitulo = $request->subtitulo;
        $microcontenidos->texto = $request->texto;
        $microcontenidos->autor = $request->autor;
        $microcontenidos->comienza = $request->comienza;
        $microcontenidos->caduca = $request->caduca;
   

        $microcontenidos->save();


       $microcontenidos = Microcontenido::find($microcontenidos->id);

        $lista_de_tags=[];

        $lista_de_tags=$request->multiselect;


        //return $lista_de_tags;
        
        for ($j=0; $j<count($lista_de_tags) ; $j++) { 
           
            $microcontenidos->tags()->attach($lista_de_tags[$j]);


          
        }
     

        //hasta aquí funciona
      //  return $lista_de_tags;
       $lista_de_ids_users=[];
        for ($h=0; $h<count($lista_de_tags) ; $h++) { 
            
            //si es un 
           

           array_push($lista_de_ids_users ,UserController::obtenerIdsPorTag($lista_de_tags[$h]));
            }

        

        //return $lista_de_ids_users;


        for ($i=0; $i <count($lista_de_ids_users) ; $i++) { 

            $microcontenidos->users()->attach($lista_de_ids_users[$i], ['opciones' => 'tag', 'visible' => 1]);



        }



        return response()->json( $microcontenidos, 201);

    }



    


}
