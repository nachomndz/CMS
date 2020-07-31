<?php

namespace App\Http\Controllers\Microcontenido;

use App\Http\Controllers\Controller;
use App\Http\Controllers\metodosController;
use App\Http\Controllers\User\UserController;
use App\Image;
use App\Microcontenido;
use App\Perfil;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $microcontenidos = Microcontenido::all();
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

        $microcontenidos->comienza = date("Y-m-d H:i:s", strtotime($request->comienza));

        $microcontenidos->caduca = date("Y-m-d H:i:s", strtotime($request->caduca));

        if ($request->hasFile('image')) {
            $path = $request->image->store('public');

            $microcontenidos->path = $path;
        }

        $microcontenidos->save();

        $lista_de_ids = [];
        $array = $request->multiselect;

        //arrayy es el array de perfiles
        $arrayy = [];
        for ($h = 0; $h < count($array); $h++) {


            //sino es un valor numerico es un perfil.
            if (!is_numeric($array[$h])) {
                array_push($arrayy, $array[$h]);
            }
        }

        $objetosPerfiles = Perfil::whereIn('puesto', $arrayy)->get();

        $microcontenidos->perfiles()->saveMany($objetosPerfiles);


        for ($h = 0; $h < count($array); $h++) {

            if (!is_numeric($array[$h]))
                //me devuelve los id's de los usuarios con esos perfiles
                array_push($lista_de_ids, UserController::obtenerIdsPorPerfil($array[$h]));

        }
        $arraydeids = [];
        $arraydeids = $lista_de_ids;

        //obtenemos los que son directos

        $lista_directos = [];

        $repetidos = array_merge($array, $lista_de_ids);

        $lista_de_ids = array_unique($repetidos);


        $comienzo = count($array);

        $arraydefinitivo = [];


        for ($v = 0; $v < count($lista_de_ids); $v++) {
            if (is_numeric($lista_de_ids[$v])) {

                array_push($arraydefinitivo, $lista_de_ids[$v]);
            }
        }

        for ($i = $comienzo; $i < count($lista_de_ids); $i++) {
            for ($j = 0; $j < count($lista_de_ids[$i]); $j++) {
                //saco el valor de cada elemento
                //echo $lista_de_ids[$i][$j].'<br>';

                array_push($arraydefinitivo, $lista_de_ids[$i][$j]);
            }
        }
        $arraysinrepetidos = [];
        for ($i = 0; $i < count($arraydefinitivo); $i++) {

            if (intval($arraydefinitivo[$i]) == null) {
                array_push($arraysinrepetidos[$i], intval($arraydefinitivo[$i]));
            }
        }

        $arraysinrepetidos = array_unique($arraydefinitivo);



        for ($i = 0; $i < count($arraysinrepetidos); $i++) {

            $microcontenidos->users()->attach($arraysinrepetidos[$i], ['opciones' => 'dirigido', 'visible' => 1]);
        }
    
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











    public function almacenaPorTag(Request $request)
    {

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
        $microcontenidos->comienza = date("Y-m-d H:i:s", strtotime($request->comienza));
        $microcontenidos->caduca = date("Y-m-d H:i:s", strtotime($request->caduca));

        if ($request->hasFile('image')) {
            $path = $request->image->store('public');

            $microcontenidos->path = $path;
     
        }

        $microcontenidos->save();


        $microcontenidos = Microcontenido::find($microcontenidos->id);

        $lista_de_tags = [];

        $lista_de_tags = $request->multiselect;

        for ($j = 0; $j < count($lista_de_tags); $j++) {

            $microcontenidos->tags()->attach($lista_de_tags[$j]);
        }

        $lista_de_ids_users = [];
        for ($i = 0; $i < count($lista_de_tags); $i++) {
       
            array_push($lista_de_ids_users, UserController::obtenerIdsPorTag($lista_de_tags[$i]));
        }

        $lista_users_repetidos = [];
        for ($i = 0; $i < count($lista_de_ids_users); $i++) {
            for ($j = 0; $j < count($lista_de_ids_users[$i]); $j++) {


                array_push($lista_users_repetidos, $lista_de_ids_users[$i][$j]);
            }
        }

        //quitar repetidos

        $lista_users_sin_repetir = array_unique($lista_users_repetidos);

        for ($i = 0; $i < count($lista_de_ids_users); $i++) {


            $microcontenidos->users()->attach($lista_de_ids_users[$i], ['opciones' => 'tag', 'visible' => 1]);
        }
       metodosController::redirect_now('/newsTag');
        return response()->json($microcontenidos, 201);
    }



    public function ocultarNoticia(Request $request)
    {


        $user = User::find(Auth::user()->id);

        $user->microcontenidos()->updateExistingPivot($request->id, ['visible' => '0']);
    }



   


    public function mostrarNoticia(Request $request)
    {


        $user = User::find(Auth::user()->id);

        $user->microcontenidos()->updateExistingPivot($request->id, ['visible' => '1']);
    }



    public static function filtrar_ocultas()
    {

        $id = Auth::user()->id;
        $user_contenidos = User::with('microcontenidos')->where('id', $id)->get();

        $result = $user_contenidos->get(0)->microcontenidos->filter(function ($v, $k) {
            return $v->pivot->visible == 0;
        })->values();



        return $result;
    }



    public function ocultarNew($id ,$user)
    {



        //$user = User::find(Auth::user()->id);

        $user->microcontenidos()->updateExistingPivot($id, ['visible' => '0']);
    }
}
