<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Microcontenido;
use App\Perfil;
use App\Tag;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telefono' => ['required','string', 'max:12'],
            
            //'intereses' => ['required'],
            'perfil_id' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            /* nuevo campo telefono e intereses */
            
            'telefono'=> $data['telefono'],
            //'intereses' => $data['intereses'],
            'perfil_id' => $data['perfil_id'],
         
        ]);


        //asingamos los tags al usuario.
        foreach ($data['multiselect'] as $tag){

       
            $user->tags()
              ->attach(Tag::where('id', $tag)->first());
        }

     
        $n=Perfil::with('microcontenidos')
        ->where('id',$data['perfil_id'])
        ->whereHas('microcontenidos')
        ->get();


        $ids_microcontenidos_del_perfil=$n->map(function($val, $key){
            return $val->microcontenidos
            ->map(function($v,$k){
                return $v->pivot->contenido_id;
            });

        })->get(0);
        //->toArray();

        if($ids_microcontenidos_del_perfil){
            $ids_microcontenidos_del_perfil->toArray();
            $user->microcontenidos()->attach($ids_microcontenidos_del_perfil, ['opciones' => 'dirigido', 'visible' => 1]);

        }




       



     /*   $contenidosportag=Microcontenido::with('tags')
        ->whereHas('tags',function($q){$q->whereIn('tag_id',[1,11]);})->get();
        */
        
        $contenidosportag=Tag::with('microcontenidos')
        ->whereIn('id',$data['multiselect'])
        ->whereHas('microcontenidos')
        ->get();




       $ids_microcontenidos_delos_tags= $contenidosportag->map(function($val, $key){
           return $val->microcontenidos
           ->map(function($v,$k){
               return $v->id;});
            })->get(0);
           // ->toArray();


            if($ids_microcontenidos_delos_tags){

                $ids_microcontenidos_delos_tags->toArray();
                $user->microcontenidos()->attach($ids_microcontenidos_delos_tags, ['opciones' => 'tag', 'visible' => 1]);
            }

           

        //App\Http\Controllers\Auth\Microcontenido micro;
        

        



       // $user->microcontenidos()->attach()

      /*  

*/


        return $user;
    }
}
