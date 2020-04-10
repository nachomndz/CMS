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
Route::get('noticias','showNewsController@index')->middleware('auth'); //,->name('noticias');



Route::get('miarea', function(){
    return view('miarea');
});
//acceso restringido a menos que tengas rol de editor
Route::get('newsEdit','EdicionController@index')->name('newsEdit');
   
/*Route::get('newsEdit', function(){
    return view('newsEdit');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::any('mibbddpma', '\Aranyasen\LaravelAdminer\AdminerAutologinController@index')->name('mibbddpma');//->middleware('role:admin', 'level:5'); // admin and level >= 9
//Route::any('adminer', '\Aranyasen\LaravelAdminer\AdminerAutologinController@index');

Route::any('mibbddpma', '\Aranyasen\LaravelAdminer\AdminerAutologinController@index')->name('mibbddpma')->middleware('role:admin', 'level:5'); // admin and level >= 9


//Que quiere decir que cuando se realice 
//una petición post a microcontenido se ejecutará el método store del controlador MensajesController.
Route::post('microcontenido', 'Microcontenido\MicrocontenidoController@store')->name('store');