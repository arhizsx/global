<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FieldMonitor;
use App\Http\Controllers\RegistrationController;


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

                case "active_chapter_check":

                    $chp = new RegistrationController($request);
                    return $chp->ActiveChapterCheck($request);

                    break;

                case "active_lady_chapter_check":

                    $chp = new RegistrationController($request);
                    return $chp->ActiveChapterCheck($request);

                    break;

                case "triskelion_registration_confirm":

                    $chp = new RegistrationController($request);
                    return $chp->ConfirmRegistration($request);

                    break;

                case "lady_triskelion_registration_confirm":

                    $chp = new RegistrationController($request);
                    return $chp->ConfirmRegistration($request);

                    break;

                case "neophyte_application_confirm":

                    $chp = new RegistrationController($request);
                    return $chp->ConfirmRegistration($request);

                    break;

                case "chapter_registration_confirm":

                    $chp = new RegistrationController($request);
                    return $chp->ConfirmRegistration($request);

                    break;

                case "chapter_history_confirm":

                    $chp = new RegistrationController($request);
                    return $chp->ConfirmRegistration($request);

                    break;

                case "tgs_chapter_registration_confirm":

                    $chp = new RegistrationController($request);
                    return $chp->ConfirmRegistration($request);

                    break;

                case "new_chapter_application_confirm":

                    $chp = new RegistrationController($request);
                    return $chp->ConfirmRegistration($request);

                    break;

                case "council_registration_confirm":

                    $chp = new RegistrationController($request);
                    return $chp->ConfirmRegistration($request);

                    break;

                default:

                    return "Action not yet defined: " . $request->action . " in AjaxHandler";

                    break;

            }

        } else {

            return "Action not set";
        }


    }

}
