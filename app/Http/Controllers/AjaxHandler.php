<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxHandler extends Controller
{
    function index(Request $request){

        return $request;

    }

}
