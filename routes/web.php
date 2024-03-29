<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



/*Route::get('noticias', function(){
    return view('shownews');
});
*/

//acceso restringido solo a usuarios logueados
Route::get('muestraNoticias','showNewsController@index')->middleware('auth'); //,->name('noticias');



Route::get('miarea',function(){
    return view('miarea');
});
//acceso restringido a menos que tengas rol de editor
Route::get('newsEdit','EdicionController@index')->name('newsEdit');

Route::get('newsTag','EdicionPorTagController@index')->name('newsTag');


Route::get('tagsEditor','tagsEditorController@index')->name('tagsEditor');


Route::get('gestorUsuarios','gestorUsuariosController@index')->name('gestorUsuarios');

/*Route::get('newsEdit', function(){
    return view('newsEdit');
});*/

/*Route::get('/test', function(){
    $user=App\User::with('microcontenidos')->find(1)->microcontenidos->find(1)->pivot->where("visible",1)->get()->pluck('contenido_id');
       //return $user;
      $data= App\Microcontenido::whereIn('id', $user)->get();
      return $data;
});*/



Route::get('get-contenidos/{isShow}','User\UserController@getMisContenidos')->name('getMisContenidos');


Route::get('get-tags/{id}','User\UserController@mostrarTagsUsuario')->name('mostrarTagsUsuario');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::any('mibbddpma', '\Aranyasen\LaravelAdminer\AdminerAutologinController@index')->name('mibbddpma');//->middleware('role:admin', 'level:5'); // admin and level >= 9
//Route::any('adminer', '\Aranyasen\LaravelAdminer\AdminerAutologinController@index');

Route::any('mibbddpma', '\Aranyasen\LaravelAdminer\AdminerAutologinController@index')->name('mibbddpma')->middleware('role:admin', 'level:5'); // admin and level >= 9


//Que quiere decir que cuando se realice 
//una petición post a microcontenido se ejecutará el método store del controlador MicrocontenidosController.
Route::post('microcontenido', 'Microcontenido\MicrocontenidoController@store')->name('store');


Route::post('ocultar-noticia', 'Microcontenido\MicrocontenidoController@ocultarNoticia')->name('ocultarNoticia');

Route::get('ocultarNew/{id}/{user}', [
    'as' => 'ocultarNew',
    'uses' => 'Microcontenido@ocultarNew',
]);


Route::post('mostrar-noticia', 'Microcontenido\MicrocontenidoController@mostrarNoticia')->name('mostrarNoticia');


Route::post('filtrar-ocultas', 'Microcontenido\MicrocontenidoController@filtrar_ocultas');

Route::post('almacenaPorTag', 'Microcontenido\MicrocontenidoController@almacenaPorTag')->name('almacenaPorTag');



Route::post('guardarTag','Tag\TagController@store')->name('guardarTag');


Route::post('borrarTag','Tag\TagController@borrarTag')->name('borrarTag');


Route::resource('tag', 'Tag\TagController');