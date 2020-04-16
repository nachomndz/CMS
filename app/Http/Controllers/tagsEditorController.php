<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tagsEditorController extends Controller
{
    //





    public function __construct()
    {
        $this->middleware('edicionMidd');
    }



    public function index()
    {
        return view('tagsEditor');
    }

}
