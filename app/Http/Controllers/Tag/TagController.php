<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Controllers\metodosController;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $tags= Tag::all();
        return $tags;

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
        $validatedData = $request->validate([
            'name' => 'required|max:40',
           
        ]);


        $tag = new Tag;   

        $tag->name = $request->name;
        $tag->save();



        metodosController::redirect_now('/tagsEditor');
        return response()->json($tag, 201);

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
        $tag = Tag::find($id);
        $tag->delete();
   
    }



    public static function staticIndex(){
        $tags= Tag::all();
        return $tags;
}


public static function borrarTag(Request $request)
{

    //whereIn --> El método whereIn verifica que un valor de una 
    //            columna dada esté contenido dentro del arreglo dado:


   $tags = Tag::whereIn('id', $request->multiselect)->get();
   

    foreach ($tags as $tag){
        $tag->delete();
    }

    return redirect('/tagsEditor');
}












}



