<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class metodosController extends Controller
{
   



   public static function redirect_now($url, $code = 302)
{
    try {
        app()->abort($code, '', ['Location' => $url]);
    } catch (\Exception $exception) {
        // the blade compiler catches exceptions and rethrows them
        // as ErrorExceptions :(
        //
        // also the __toString() magic method cannot throw exceptions
        // in that case also we need to manually call the exception
        // handler
        $previousErrorHandler = set_exception_handler(function () {
        });
        restore_error_handler();
        call_user_func($previousErrorHandler, $exception);
        die;
    }
}
}
