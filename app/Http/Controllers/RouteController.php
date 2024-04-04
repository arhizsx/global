<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
{

    public function index(){

        return view('index');

    }

    public function triskelions( $page = null ){

        if( $page == null ){

            $page = 'triskelions';

        }

        $data = $this->getData($page);


        return view( $page, compact("data") );

    }

    public function chapters( $page = null ){

        if( $page == null ){

            $page = 'chapters';

        }

        $data = $this->getData($page);

        return view( $page, compact("data") );

    }

    public function councils( $page = null ){

        if( $page == null ){

            $page = 'councils';

        }

        $data = $this->getData($page);

        return view( $page, compact("data") );

    }

    public function record_update( $page = null ){

        if( $page == null ){

            $page = 'record-update';

        } else {

            $page = "record-update-". $page;

        }

        $data = $this->getData($page);

        return view( $page, compact("data") );

    }
    public function record_update_council( $page = null ){

        if( $page == null ){

            $page = 'record-update-council';

        } else {

            $page = "record-update-council-". $page;

        }

        $data = $this->getData($page);

        return view( $page, compact("data") );

    }

    public function record_update_chapter( $page = null ){

        if( $page == null ){

            $page = 'record-update-chapter';

        } else {

            $page = "record-update-chapter-". $page;

        }

        $data = $this->getData($page);

        return view( $page, compact("data") );

    }

    private function getData( $page ){

        if($page == "record-update-chapter-registered"){

            $data = [
                "chapters" => []
            ];

            return json_decode( json_encode($data), true);
        }
        elseif($page == "record-update-council-registered"){

            $data = [
                "councils" => []
            ];

            return json_decode( json_encode($data), true);

        }
        elseif($page == "council-registration"){

            $form_data = DB::table("registrations")
                            ->where("user_id", Auth::user()->id)
                            ->where("form", "council_registration")
                            ->where("status", "pending")
                            ->first();

            if($form_data){

                $formdata = json_decode($form_data->data, true);

                $formdata = [
                    "fields_data" => $formdata["fields_data"]
                ];

            } else {

                $formdata = [
                    "fields_data" => []
                ];

            }



            return json_decode( json_encode($formdata), true);
        }

        elseif($page == "chapter-registration"){

            $form_data = DB::table("registrations")
                            ->where("user_id", Auth::user()->id)
                            ->where("form", "chapter_registration")
                            ->where("status", "pending")
                            ->first();

            if($form_data){

                $formdata = json_decode($form_data->data, true);

                $formdata = [
                    "fields_data" => $formdata["fields_data"]
                ];

            } else {

                $formdata = [
                    "fields_data" => []
                ];

            }

            return json_decode( json_encode($formdata), true);

        }

        elseif($page == "tgs-chapter-registration"){

            $form_data = DB::table("registrations")
                            ->where("user_id", Auth::user()->id)
                            ->where("form", "tgs_chapter_registration")
                            ->where("status", "pending")
                            ->first();

            if($form_data){

                $formdata = json_decode($form_data->data, true);

                $formdata = [
                    "fields_data" => $formdata["fields_data"]
                ];

            } else {

                $formdata = [
                    "fields_data" => []
                ];

            }



            return json_decode( json_encode($formdata), true);

        }

        elseif($page == "triskelion-registration"){

            $form_data = DB::table("registrations")
                            ->where("user_id", Auth::user()->id)
                            ->where("form", "triskelion_registration")
                            ->where("status", "pending")
                            ->first();

            if($form_data){

                $formdata = json_decode($form_data->data, true);

                $formdata = [
                    "fields_data" => $formdata["fields_data"]
                ];

            } else {

                $formdata = [
                    "fields_data" => []
                ];

            }

            return json_decode( json_encode($formdata), true);

        }

        elseif($page == "lady-triskelion-registration"){

            $form_data = DB::table("registrations")
                            ->where("user_id", Auth::user()->id)
                            ->where("form", "lady_triskelion_registration")
                            ->where("status", "pending")
                            ->first();

            if($form_data){

                $formdata = json_decode($form_data->data, true);

                $formdata = [
                    "fields_data" => $formdata["fields_data"]
                ];

            } else {

                $formdata = [
                    "fields_data" => []
                ];

            }

            return json_decode( json_encode($formdata), true);

        }

        elseif($page == "neophyte-application"){

            $form_data = DB::table("registrations")
                            ->where("user_id", Auth::user()->id)
                            ->where("form", "neophyte_application")
                            ->where("status", "pending")
                            ->first();

            if($form_data){

                $formdata = json_decode($form_data->data, true);

                $formdata = [
                    "fields_data" => $formdata["fields_data"]
                ];

            } else {

                $formdata = [
                    "fields_data" => []
                ];

            }

            return json_decode( json_encode($formdata), true);

        }

        elseif($page == "new-chapter-application"){

            $form_data = DB::table("registrations")
                            ->where("user_id", Auth::user()->id)
                            ->where("form", "new_chapter_application")
                            ->where("status", "pending")
                            ->first();

            if($form_data){

                $formdata = json_decode($form_data->data, true);

                $formdata = [
                    "fields_data" => $formdata["fields_data"]
                ];

            } else {

                $formdata = [
                    "fields_data" => []
                ];

            }

            return json_decode( json_encode($formdata), true);


        }


        return [
            "page" => $page
         ];

    }

}
