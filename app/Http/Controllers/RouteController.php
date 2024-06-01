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

        if( $page == "triskelions" ){

            $data = [];
            $config = [];

            $view = 'triskelions';

        }
        elseif($page == "profile-update") {

            $data = $this->getData($page);
            $config = $this->getConfig($page);

            $view = 'template_profile';

        }
        else {

            $data = $this->getData($page);
            $config = $this->getConfig($page);

            $view = 'template_registration';
        }

        return view( $view, compact("data","config"));

    }

    public function chapters( $page = null, $id = null, $second_page = null ){

        if( $page == null ){
            $page = 'chapters';
        }

        if($page == "chapters") {
            $data = [];
            $config = [];
            $view = 'chapters';
        }
        elseif($page == "delegate-chapter") {

            $data = $this->getData( $page );
            $config = $this->getConfig( $page );

            $view = 'template_delegate';

        }
        elseif($page == "chapter-update") {


            if( $id == null){


                $check = $this->ListOrView($page);


                if( $check["result"] == "list" ){



                    $data = $this->getData( $page . "-list" );
                    $config = $this->getConfig( $page . "-list" );


                    $view = 'template_update_list';

                }
                elseif( $check["result"] == "view" ){

                    $data = $this->getData( $page . "-view"  );
                    return redirect()->to('/chapters/chapter-update/' . $data["fields_data"]["chapter_id"]);

                }
                elseif( $check["result"] == "empty" ){

                    $data = [];
                    $config = $this->getConfig( $page );

                    $view = 'template_update_empty';

                }

            }
            else {

                if( $second_page == null ){


                    $data = $this->getData( $page . "-selection", $id  );
                    $config = $this->getConfig( $page );

                    $view = 'template_update';

                } else {

                    $data = $this->getData( $page . "-" . $second_page, $id  );
                    $config = $this->getConfig( $page );

                    // dd(  $data );

                    $view = 'template_update_page2';

                }


            }

        }
        elseif($page == "chapter-update-triskelions") {

            $data = $this->getData( $page, $id  );
            $config = $this->getConfig( $page );

            $view = 'template_update_page2';

        }
        else {

            $data = $this->getData( $page );
            $config = $this->getConfig($page);

            $view = 'template_registration';

        }

        return view( $view, compact("data", "config") );

    }

    public function councils( $page = null, $id = null ){

        if( $page == null ){
            $page = 'councils';
        }

        if($page == "councils") {
            $data = [];
            $config = [];
            $view = 'councils';
        }
        elseif($page == "delegate-council") {


            $data = $this->getData( $page );
            $config = $this->getConfig( $page );

            $view = 'template_delegate';

        }
        elseif($page == "council-update") {

            if( $id == null){


                $check = $this->ListOrView($page);


                if( $check["result"] == "list" ){

                    $data = $this->getData( $page . "-list" );
                    $config = $this->getConfig( $page . "-list" );

                    $view = 'template_update_list';

                }
                elseif( $check["result"] == "view" ){

                    $data = $this->getData( $page . "-view"  );
                    return redirect()->to('/chapters/chapter-update/' . $data["fields_data"]["chapter_id"]);

                }
                elseif( $check["result"] == "empty" ){

                    $data = [];
                    $config = $this->getConfig( $page );

                    $view = 'template_update_empty';

                }

            }
            else {

                $data = $this->getData( $page . "-selection", $id  );
                $config = $this->getConfig( $page );

                $view = 'template_update';

            }

        }
        else {

            $data = $this->getData( $page );
            $config = $this->getConfig($page);

            $view = 'template_registration';

        }

        return view( $view, compact("data", "config") );



    }

    // ////////////////////
    //
    // getConfig Function
    //
    // ////////////////////

    private function getConfig( $page ) {


        $logo = "<svg class='bi me-2' width='70' height='70'><use xlink:href='#logo'></use></svg>";
        $json = "";
        $form = "";
        $chapter_check = true;

        $button_cancel_label = "Clear Entry";
        $button_cancel_margin = "me-3";
        $button_cancel_color = "";

        $button_continue_label = "Submit My Registration";
        $button_continue_margin = "";
        $button_continue_color = "";


        switch ($page){

            case "triskelion-registration":

                $config_type = "registration";

                $json = "triskelion-registration.json";
                $form = "triskelion_registration";
                $chapter_check = true;

                $modal_confirm_action = "triskelion-registration-confirm";
                $modal_title = "Triskelion Registration";
                $backlink = "/triskelions";
                $backlink_title = "Triskelions";

                $button_cancel_action = "triskelion-registration-cancel";
                $button_continue_action = "triskelion-registration-continue";

            break;

            case "lady-triskelion-registration":

                $config_type = "registration";

                $logo = "<img class='mb-2' src='/images/taugammasigma.png' width='70' height='70'>";
                $json = "lady-triskelion-registration.json";
                $form = "lady_triskelion_registration";

                $modal_confirm_action = "lady-triskelion-registration-confirm";
                $modal_title = "Lady Triskelion Registration";
                $backlink = "/triskelions";
                $backlink_title = "Triskelions";

                $button_cancel_action = "lady-triskelion-registration-cancel";
                $button_continue_action = "lady-triskelion-registration-continue";

            break;

            case "neophyte-application":

                $config_type = "registration";

                $json = "neophyte-application.json";
                $form = "neophyte_application";

                $modal_confirm_action = "neophyte-application-confirm";
                $modal_title = "Neophyte Application";
                $backlink = "/triskelions";
                $backlink_title = "Triskelions";

                $button_cancel_action = "neophyte-application-cancel";
                $button_continue_action = "neophyte-application-continue";

            break;

            case "profile-update":

                $config_type = "update";

                $json = "profile-update.json";
                $form = "profile_update";

                $modal_confirm_action = "profile-update-confirm";
                $modal_title = "Profile Update";
                $backlink = "/triskelions";
                $backlink_title = "Triskelions";

                $button_cancel_action = "profile-update-cancel";
                $button_continue_action = "profile-update-continue";

            break;

            case "chapter-registration":

                $config_type = "registration";

                $json = "chapter-registration.json";
                $form = "chapter_registration";
                $chapter_check = false;

                $modal_confirm_action = "chapter-registration-confirm";
                $modal_title = "Chapter Registration";
                $backlink = "/chapters";
                $backlink_title = "Chapters";

                $button_cancel_action = "chapter-registration-cancel";
                $button_continue_action = "chapter-registration-continue";

            break;

            case "tgs-chapter-registration":

                $config_type = "registration";

                $logo = "<img class='mb-2' src='/images/taugammasigma.png' width='70' height='70'>";
                $json = "tgs-chapter-registration.json";
                $form = "tgs_chapter_registration";
                $chapter_check = false;

                $modal_confirm_action = "tgs-chapter-registration-confirm";
                $modal_title = "TGS Chapter Registration";
                $backlink = "/chapters";
                $backlink_title = "Chapters";

                $button_cancel_action = "tgs-chapter-registration-cancel";
                $button_continue_action = "tgs-chapter-registration-continue";

            break;

            case "new-chapter-application":

                $config_type = "registration";

                $json = "new-chapter-application.json";
                $form = "new_chapter_application";
                $chapter_check = false;

                $modal_confirm_action = "new-chapter-application-confirm";
                $modal_title = "New Chapter Application";
                $backlink = "/chapters";
                $backlink_title = "Chapters";

                $button_cancel_action = "new-chapter-application-cancel";
                $button_continue_action = "new-chapter-application-continue";

            break;

            case "chapter-history":

                $config_type = "registration";

                $json = "chapter-history.json";
                $form = "chapter_history";
                $chapter_check = false;

                $modal_confirm_action = "chapter-history-confirm";
                $modal_title = "Chapter History";
                $backlink = "/chapters";
                $backlink_title = "Chapters";

                $button_cancel_action = "chapter-history-cancel";
                $button_continue_action = "chapter-history-continue";

            break;

            case "council-registration":

                $config_type = "registration";

                $json = "council-registration.json";
                $form = "council_registration";
                $chapter_check = false;

                $modal_confirm_action = "council-registration-confirm";
                $modal_title = "Council Registration";
                $backlink = "/councils";
                $backlink_title = "Councils";

                $button_cancel_action = "council-registration-cancel";
                $button_continue_action = "council-registration-continue";

            break;

            // /////////////
            // DELEGATE
            // /////////////

            case "delegate-chapter":

                $config_type = "delegate";

                $json = "chapter-update.json";
                $form = "chapter_update";
                $chapter_check = false;

                $modal_confirm_action = "chapter-history-confirm";
                $modal_title = "Delegate Chapter";
                $backlink = "/chapters";
                $backlink_title = "Chapters";

                $button_cancel_action = "chapter-history-cancel";
                $button_continue_action = "chapter-history-continue";

            break;

            case "delegate-council":

                $config_type = "delegate";

                $json = "council-details.json";
                $form = "delegate_council";
                $chapter_check = false;

                $modal_confirm_action = "delegate-council-confirm";
                $modal_title = "Delegate Council";
                $backlink = "/councils";
                $backlink_title = "Councils";

                $button_cancel_action = "delegate-council-cancel";
                $button_continue_action = "delegate-council-continue";

            break;

            // /////////////
            // UPDATE
            // /////////////

            case "chapter-update":

                $config_type = "update";

                $json = "chapter-update.json";

                $modal_confirm_action = "chapter-history-confirm";
                $modal_title = "Chapter Update";
                $backlink = "/chapters";
                $backlink_title = "Chapters";

                $button_cancel_action = "chapter-history-cancel";
                $button_continue_action = "chapter-history-continue";

            break;

            case "chapter-update-list":

                $config_type = "update";

                $json = "chapter-update.json";

                $modal_confirm_action = "chapter-history-confirm";
                $modal_title = "Chapter Update";
                $backlink = "/chapters";
                $backlink_title = "Chapters";

                $button_cancel_action = "chapter-update-cancel";
                $button_continue_action = "chapter-update-continue";

            break;

            case "chapter-update-triskelions":

                $config_type = "triskelions";

                $json = "chapter-update.json";

                $modal_confirm_action = "chapter-history-confirm";
                $modal_title = "Chapter Update";
                $backlink = "/chapters";
                $backlink_title = "Chapters";

                $button_cancel_action = "chapter-update-cancel";
                $button_continue_action = "chapter-update-continue";

            break;

            case "council-update":

                $config_type = "update";

                $json = "council-update.json";
                $form = "council_update";
                $chapter_check = false;

                $modal_confirm_action = "council-update-confirm";
                $modal_title = "Council Update";
                $backlink = "/councils";
                $backlink_title = "Councils";

                $button_cancel_action = "council-update-cancel";
                $button_continue_action = "council-update-continue";

            break;


            case "council-update-list":

                $config_type = "update";

                $json = "council-update.json";

                $modal_confirm_action = "council-update-confirm";
                $modal_title = "Council Update";
                $backlink = "/councils";
                $backlink_title = "Councils";

                $button_cancel_action = "council-update-cancel";
                $button_continue_action = "council-update-continue";

            break;

            default:

                $allowed_direct = array("chapters", "triskelions", "councils");

                if( in_array( $page, $allowed_direct ) == false ){
                    dd($page);
                }
                return [];
                break;

        }

        if( $config_type == "registration" ){

            $pending_registration = DB::table("registrations")
                                    ->where("status", "pending")
                                    ->where("user_id", Auth::user()->id)
                                    ->where("form", $form)
                                    ->first();

            $pending_approval = DB::table("registrations")
                                    ->where("status", "Pending Registration Approval")
                                    ->where("user_id", Auth::user()->id)
                                    ->where("form", $form)
                                    ->first();

            $config = [

                "logo" => $logo,
                "json" => $json,
                "form" => $form,
                "chapter_check" => $chapter_check,

                "pending_registration" => $pending_registration,
                "pending_approval" => $pending_approval,

                "modal_confirm_action" => $modal_confirm_action,
                "modal_title" => $modal_title,
                "backlink" => $backlink,
                "backlink_title" => $backlink_title,

                "button_cancel_label" => $button_cancel_label,
                "button_cancel_margin" => $button_cancel_margin,
                "button_cancel_color" => $button_cancel_color,
                "button_cancel_action" => $button_cancel_action,

                "button_continue_label" => $button_continue_label,
                "button_continue_margin" => $button_continue_margin,
                "button_continue_color" => $button_continue_color,
                "button_continue_action" => $button_continue_action,

            ];

        }
        elseif( $config_type == "delegate" ){

            $config = [

                "logo" => $logo,
                "json" => $json,
                "form" => $form,
                "chapter_check" => $chapter_check,

                "modal_confirm_action" => $modal_confirm_action,
                "modal_title" => $modal_title,
                "backlink" => $backlink,
                "backlink_title" => $backlink_title,

                "button_cancel_label" => $button_cancel_label,
                "button_cancel_margin" => $button_cancel_margin,
                "button_cancel_color" => $button_cancel_color,
                "button_cancel_action" => $button_cancel_action,

                "button_continue_label" => $button_continue_label,
                "button_continue_margin" => $button_continue_margin,
                "button_continue_color" => $button_continue_color,
                "button_continue_action" => $button_continue_action,

            ];


        }
        elseif( $config_type == "update" ){

            $config = [

                "logo" => $logo,
                "json" => $json,
                "form" => $form,
                "chapter_check" => $chapter_check,

                "modal_confirm_action" => $modal_confirm_action,
                "modal_title" => $modal_title,
                "backlink" => $backlink,
                "backlink_title" => $backlink_title,

                "button_cancel_label" => $button_cancel_label,
                "button_cancel_margin" => $button_cancel_margin,
                "button_cancel_color" => $button_cancel_color,
                "button_cancel_action" => $button_cancel_action,

                "button_continue_label" => $button_continue_label,
                "button_continue_margin" => $button_continue_margin,
                "button_continue_color" => $button_continue_color,
                "button_continue_action" => $button_continue_action,

            ];


        }
        elseif( $config_type == "triskelions" ){

            $config = [

                "logo" => $logo,
                "json" => $json,
                "form" => $form,
                "chapter_check" => $chapter_check,

                "modal_confirm_action" => $modal_confirm_action,
                "modal_title" => $modal_title,
                "backlink" => $backlink,
                "backlink_title" => $backlink_title,

                "button_cancel_label" => $button_cancel_label,
                "button_cancel_margin" => $button_cancel_margin,
                "button_cancel_color" => $button_cancel_color,
                "button_cancel_action" => $button_cancel_action,

                "button_continue_label" => $button_continue_label,
                "button_continue_margin" => $button_continue_margin,
                "button_continue_color" => $button_continue_color,
                "button_continue_action" => $button_continue_action,

            ];


        }
        return $config;
    }

    // /////////////////
    //
    // getData Function
    //
    // /////////////////

    private function getData( $page, $id = null ){

        // ******************************
        // Data Classification by $page
        // ******************************

        switch( $page ){

            case "triskelion-registration":

                $getdata_type = "registration";
                $form = "triskelion_registration";

                break;

            case "profile-update":

                $getdata_type = "profile";
                $form = "profile_update";

                break;

            case "lady-triskelion-registration":

                $getdata_type = "registration";
                $form = "triskelion_registration";

                break;

            case "neophyte-application":

                $getdata_type = "registration";
                $form = "lady_triskelion_registration";

                break;

            case "chapter-registration":

                $getdata_type = "registration";
                $form = "chapter_registration";

            break;

            case "tgs-chapter-registration":

                $getdata_type = "registration";
                $form = "tgs_chapter_registration";
                break;

            case "new-chapter-application":

                $getdata_type = "registration";
                $form = "new_chapter_registration";
                break;

            case "council-registration":

                $getdata_type = "registration";
                $form = "council_registration";
                break;


            case "council-update":

                $getdata_type = "update";
                $form = "council_update";
                break;

            case "council-update-list":

                $getdata_type = "list";
                $form = "council_update";
                break;


            case "council-update-view":

                $getdata_type = "view";
                $form = "council_update";
                break;

            case "council-update-selection":

                $getdata_type = "selection";
                $form = "council_update";
                break;


            case "chapter-update":

                $getdata_type = "update";
                $form = "chapter_update";
                break;

            case "chapter-update-list":

                $getdata_type = "list";
                $form = "chapter_update";
                break;


            case "chapter-update-view":

                $getdata_type = "view";
                $form = "chapter_update";
                break;

            case "chapter-update-selection":

                $getdata_type = "selection";
                $form = "chapter_update";
                break;

            case "chapter-update-triskelions":

                $getdata_type = "triskelion";
                $form = "chapter_update";
                break;

            case "delegate-chapter":

                $getdata_type = "list";
                $form = "delegate_chapter";
                break;

            case "delegate-council":

                $getdata_type = "list";
                $form = "delegate_council";
                break;

            default:

                $getdata_type = "";
                $form = "";

            break;

        }


        // ********************************
        // Data Handling by $getdata_type
        // ********************************

        if( $getdata_type == "registration" ){

            $registration_data = DB::table("registrations")
                    ->where("user_id", Auth::user()->id)
                    ->where("form", $form)
                    ->where("status", "pending")
                    ->first();

            if($registration_data){

                $registration_data = json_decode($registration_data->data, true);

                $return_data = [
                    "fields_data" => $registration_data["fields_data"]
                ];

            } else {

                $return_data = [
                    "fields_data" => []
                ];

            }
        }

        elseif( $getdata_type == "update" ){


            $registration_data = DB::table("registrations")
                    ->where("user_id", Auth::user()->id)
                    ->where("form", $form)
                    ->where("status", "pending")
                    ->first();

            if($registration_data){

                $registration_data = json_decode($registration_data->data, true);

                $return_data = [
                    "fields_data" => $registration_data["fields_data"]
                ];

            } else {

                $return_data = [
                    "fields_data" => []
                ];

            }
        }

        elseif( $getdata_type == "list" ){

            if( $form == "chapter_update" ){

                $return_data = DB::table("chapters")
                        ->where("user_id", Auth::user()->id)
                        ->get();

            }
            elseif( $form == "delegate_chapter" ){

                $return_data = DB::table("chapters")
                        ->where("user_id", Auth::user()->id)
                        ->get();

            }
            elseif( $form == "council_update" ){

                $return_data = DB::table("chapters")
                        ->where("user_id", Auth::user()->id)
                        ->get();
            }
            elseif( $form == "delegate_council" ){

                $return_data = DB::table("chapters")
                        ->where("user_id", Auth::user()->id)
                        ->get();

            }
            else {
                $return_data = DB::table("chapters")
                        ->where("user_id", Auth::user()->id)
                        ->get();
            }

        }

        elseif( $getdata_type == "view" ){


            if( $form == "chapter_update" ){

                $return_data = DB::table("chapters")
                        ->where("user_id", Auth::user()->id)
                        ->wherenotnull("chapter_serial_number")
                        ->first();

                $return_data = json_decode(json_encode([ "fields_data" => $return_data ]), true);
            }
            elseif( $form == "council_update" ){

                $return_data = DB::table("chapters")
                        ->where("user_id", Auth::user()->id)
                        ->wherenotnull("chapter_serial_number")
                        ->first();

                $return_data = json_decode(json_encode([ "fields_data" => $return_data ]), true);
            }
            else {
                $return_data = [];
            }

        }

        elseif( $getdata_type == "selection" ){


            if( $form == "chapter_update" ){

                $return_data = DB::table("chapters")
                        ->where("chapter_id", $id)
                        ->first();


                $return_data = json_decode(json_encode([ "fields_data" => $return_data ]), true);
            }
            elseif( $form == "council_update" ){

                $return_data = DB::table("chapters")
                        ->where("chapter_id", $id)
                        ->first();

                $return_data = json_decode(json_encode([ "fields_data" => $return_data ]), true);
            }
            else {
                $return_data = [];
            }

        }

        elseif( $getdata_type == "triskelion" ){

            if( $form == "chapter_update" ){

                $return_data = DB::table("chapters")
                        ->where("chapter_id", $id)
                        ->first();

                $triskelions = DB::table("triskelions")
                                ->join("users", "triskelions.user_id", "users.id")
                                ->where("current_chapter_id",  $id)

                                ->get();


                $return_data = json_decode(json_encode(
                                [
                                    "fields_data" => $return_data,
                                    "triskelions" => $triskelions
                                ]), true);
            }

        }

        elseif( $getdata_type == "profile" ){
            $profile = DB::table("triskelions")
                ->where("user_id",  Auth::user()->id)
                ->first();

            // dd($profile);
            $return_data = json_decode(json_encode(
                            [
                                "fields_data" => $profile
                            ]), true);

        }

        else {

            $return_data = [];

        }


        return $return_data;

    }


    private function ListOrView( $page ) {

        if( isset( $_GET['mode'] ) ){
            $mode = $_GET["mode"];
        }
        else {
            $mode = "view";
        }

        switch( $page ){

            case "chapter-update":

                if($mode == "view"){

                    $data = DB::table("chapters")
                        ->where("user_id", Auth::user()->id)
                        ->wherenotnull("chapter_serial_number")
                        ->get();

                }
                elseif($mode == "list"){

                    $data = DB::table("chapters")
                        ->where("user_id", Auth::user()->id)
                        // ->wherenotnull("chapter_serial_number")
                        ->get();

                }

                break;

            case "council-update":

                if($mode == "view"){

                    $data = DB::table("chapters")
                        ->where("user_id", Auth::user()->id)
                        ->wherenotnull("chapter_serial_number")
                        ->get();

                }
                elseif($mode == "list"){

                    $data = DB::table("chapters")
                        ->where("user_id", Auth::user()->id)
                        // ->wherenotnull("chapter_serial_number")
                        ->get();

                }

                break;

            case "delegate-council":

                $data = DB::table("chapters")
                    ->where("user_id", Auth::user()->id)
                    ->get();

                break;

            case "delegate-chapters":

                $data = DB::table("chapters")
                    ->where("user_id", Auth::user()->id)
                    ->get();

                break;

            default:

                $data = [];

                break;
        }

        if( $data != null ){
            if( count( $data ) == 1 ){
                $return_data =  [
                    "count" => count( $data ),
                    "result" => "view"
                ];
            }
            elseif( count( $data ) > 1 ){
                $return_data =  [
                    "count" => count( $data ),
                    "result" => "list"
                ];
            }
        } else {
            $return_data = [
                "count" => null,
                "result" => "empty"
            ];
        }

        return $return_data;

    }



}
