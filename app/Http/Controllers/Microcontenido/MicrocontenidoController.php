<?php

namespace App\Http\Controllers\Microcontenido;

use App\Http\Controllers\Controller;
use App\Microcontenido;
use Illuminate\Http\Request;

class MicrocontenidoController extends Controller
{
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
        $microcontenidos->autor = $request->autor;
        $microcontenidos->comienza = $request->comienza;
        $microcontenidos->caduca = $request->caduca;

        $microcontenidos->save();

    

//saco el numero de elementos
//convierto string separado por comas a array
$array = explode(",", $request->user);
//saco su longitud
$longitud = count($array);
//Recorro todos los elementos
for($i=0; $i<$longitud; $i++)
      {
      //saco el valor de cada elemento
	  $microcontenidos->users()->attach($array[$i] , ['opciones' => 'dirigido' , 'visible' => 1]);
      }
//FUNCIONAL
//$microcontenidos->users()->attach($request->user , ['opciones' => 'dirigido' , 'visible' => 1]); //['visible' => 1]);
      // User::find($request->user)->Microcontenido()->save($microcontenido, '')
        return response()->json( $microcontenidos, 201);

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


}
