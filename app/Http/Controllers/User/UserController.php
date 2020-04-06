<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
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
        $users= User::all();
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
        //

     /*   $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'telefono' => 'required',
            'perfil_id' => 'required',        ];*/

           $user = new User;   

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = FacadesHash::make($request->password);
            $user->telefono = $request->telefono;
            $user->perfil_id = $request->perfil_id;

            $user->save();

            return response()->json($user, 201);



/*
            $this->validate($request,$rules);

            $user = User::create();

            return $this->showOne($user,201);*/



          /*  if (!$request->input('name') || !$request->input('email') || !$request->input('password') 
            || !$request->input('telefono') || !$request->input('perfil_id')   ){

                
                    // Se devuelve un array errors con los errores encontrados y cabecera HTTP 422 Unprocessable Entity – [Entidad improcesable] Utilizada para errores de validación.
                    // En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
                    return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan datos necesarios para el proceso de alta.'])],422);
                
        
            }


            $user=User::create($request->all());

*/
		//return 200;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

       return User::getMisContenidos($id);

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
    }

   
}
