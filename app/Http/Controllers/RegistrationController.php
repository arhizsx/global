<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RegistrationController extends Controller
{
    public $request;
    public $table;
    public $chapters;


    public function __construct($request) {

        $this->request = $request;
        $this->table = "registrations";
        $this->chapters = "chapters";

    }


    public function ActiveChapterCheck() {

        $chapter = DB::table($this->chapters)
                    ->where("chapter_name",  $this->request->active_chapter)
                    ->whereNotNull("chapter_serial_number")
                    ->first();

        if( $chapter ){

            return ["error" => false, "message" => "Success", "data" => $chapter ];


        } else {

            return ["error" => true, "message" => "Failed", "data" => $this->request->all() ];
        }
    }

    public function ConfirmRegistration(){

        $form = "";

        switch( $this->request->action ){

            case "triskelion_registration_confirm":

                $form = "triskelion_registration";

            break;

            case "lady_triskelion_registration_confirm":

                $form = "lady_triskelion_registration";

            break;

            case "lady_triskelion_registration_confirm":

                $form = "lady_triskelion_registration";

            break;

            case "neophyte_application_confirm":

                $form = "neophyte_application";

            break;

            case "chapter_registration_confirm":

                $form = "chapter_registration";

            break;

            case "tgs_chapter_registration_confirm":

                $form = "tgs_chapter_registration";

            break;

            case "new_chapter_application_confirm":

                $form = "new_chapter_application";

            break;

            case "council_registration_confirm":

                $form = "council_registration";

            break;



            default:

                return "Action Not Configured in ConfirmRegistration";

            break;

        }

        $registration_data = DB::table($this->table)
                            ->where("user_id",  Auth::user()->id )
                            ->where("status", "pending")
                            ->where("form", $form)
                            ->first();

        if( $registration_data ){

            DB::table($this->table)
            ->where("id", $registration_data->id)
            ->update([
                "status" => "Pending Registration Approval"
            ]);

            return ["error" => false, "message" => "Success", "data" => $registration_data ];

        } else {

            return ["error" => true, "message" => "Failed", "data" => $this->request->all() ];

        }

        return ["error" => false, "message" => "Success", "data" => $this->request->all() ];

    }



}
