<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\metodosController;
use App\Microcontenido;
use App\Perfil;
use App\Tag;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return $users;
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
            'name' => 'required|max:255',
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
            'telefono' => 'required|max:12',
            'perfil_id' => 'required|integer'
        ]);


        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = FacadesHash::make($request->password);
        $user->telefono = $request->telefono;
        $user->perfil_id = $request->perfil_id;

        $user->save();




       

        return response()->json($user, 201);



 
//return 'Procesando...';
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        // return User::getMisContenidos($id);


        return User::findOrFail($id);
        //return User::where('id', $id)->get();
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
        // return $id;

        // User::deleted($id);
        User::find($id)->delete();
        //User::destroy($id);

        //return redirect()



    }



    public static function obtenerTodos()
    {
        //
        $users = User::get();
        return $users;
    }





    public function obtenerIdDadoEmail(Request $request)
    {
        //


        //$user= User::find($id);
        //$user=User::all()->whereStrict('email', $email)->id;


        //echo $email;
        return User::findOrFail($request->id);
        /* $user=User::all()->whereStrict('email', $email);
        

        return $user;*/
    }


    //probando en tinker
    public static function obtenerTodosEmails($email)
    {
        //
        /* $users= User::get()->email;
        return $users;*/
        $user = User::get()->where('email', $email);



        return $user;
    }


    public static function informacionPorId($id)
    {

        return User::findOrFail($id);
    }

    /* Obtiene contenidos del usuario que estén visibles*/
    public static function getMisContenidos($isShow)
    {

        $id= Auth::user()->id;

        $contenidos = User::with('microcontenidos')->where('id', $id)->get();
        $contents=$contenidos->get(0)
        ->microcontenidos
        ->filter(function($v, $k)use($isShow){
            return $v->pivot->visible == $isShow;
        })->values();
        
        return $contents;
    }

    public static function obtenerIdsPorPerfil($puesto)
    {

        //id del puesto dado 
        $id_perfil = Perfil::where('puesto', $puesto)->first()->id;
        //return $id_perfil;
        $user = User::where('perfil_id', $id_perfil)->get()->pluck('id');

        //retorna usuarios que tienen el puesto pasado por parámetro
        return $user;
    }


    public static function obtenerPuestoPorId($id)
    {

        User::with('perfiles');
    }

    public static function obtenerIdsPorTag($id_tag)
    {


        return User::with('Tags')
            ->whereHas('Tags', function ($query) use ($id_tag) {
                $query->where('tag_id', $id_tag);
            })->get();

        // return $user;
        //return $user->id;
    }




    public static function asignarNoticiasPorTag(User $user)
    {

        $tags = $user->tags->name;
    }



    public static function allUsers()
    {
        //
        $users = User::all();
        return $users;
    }


    public static function mostrarTagsUsuario($id)
    {






        $array_ids_de_tag = User::with('Tags')->find($id)->tags->pluck('id');




        $collection = new Collection();
        foreach ($array_ids_de_tag as $indice) {

            $collection->push(Tag::find($indice));
        }


        $array = [];


        foreach ($collection as $tag) {

            // return $tag->name;
            array_push($array, $tag->name);
        }


        return $array;
    }
}
