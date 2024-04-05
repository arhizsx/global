<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FieldMonitor;


class AjaxHandler extends Controller
{
    function index(Request $request){


        if( isset($request->action) ){

            switch( $request->action ){

                case "field_monitor":

                    $fld = new FieldMonitor($request);
                    return $fld->FieldMonitor($request);
                    break;

                case "field_monitor_multi":

                    $fld = new FieldMonitor($request);
                    return $fld->FieldMonitorMulti($request);
                    break;

                case "fieldgroup_add":

                    $fld = new FieldMonitor($request);
                    return $fld->FieldGroupAdd($request);

                    break;

                default:

                    return "Action not yet defined: " . $request->action;

            }

        } else {

            return "Action not set";
        }


    }

}
