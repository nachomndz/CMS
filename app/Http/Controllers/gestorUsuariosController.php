<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gestorUsuariosController extends Controller
{
    //




    public function __construct()
    {
        $this->middleware('gestorUsuariosMidd');
    }



    public function index()
    {
        return view('gestorUsuarios');
    }
}
