<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class showNewsController extends Controller
{
    //



    public function __construct()
    {
        $this->middleware('NoticiasMidd');
    }



    public function index()
    {
        return view('shownews');
    }

}
