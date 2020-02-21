<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\EditorMiddleware;
class EdicionController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('edicionMidd');
    }



    public function index()
    {
        return view('newsEdit');
    }

}
