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



Route::get('noticias', function(){
    return view('news');
});

Route::get('newsEdit','EdicionController@index')->name('newsEdit');
   
/*Route::get('newsEdit', function(){
    return view('newsEdit');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::any('mibbddpma', '\Aranyasen\LaravelAdminer\AdminerAutologinController@index')->name('mibbddpma');//->middleware('role:admin', 'level:5'); // admin and level >= 9
//Route::any('adminer', '\Aranyasen\LaravelAdminer\AdminerAutologinController@index');

Route::any('mibbddpma', '\Aranyasen\LaravelAdminer\AdminerAutologinController@index')->name('mibbddpma')->middleware('role:admin', 'level:5'); // admin and level >= 9
