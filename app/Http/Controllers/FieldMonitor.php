<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FieldMonitor extends Controller
{
    public $request;
    public $table;
    public $registration_form;


    public function __construct($request) {

        $this->request = $request;
        $this->table = "registrations";

        if( isset( $request->form_id ) ){

            $this->registration_form = $request->form_id;

        } else {

            $this->registration_form = null;
        }

    }


    public function FieldMonitor() {


        if($this->table !== null ){

            $result = DB::table( $this->table )
                        ->where("user_id", Auth::user()->id)
                        ->where("form", $this->registration_form)
                        ->get();

            if( count( $result ) > 0 ){

                $data = json_decode($result[0]->data, true);

                $data["fields_data"][ $this->request->field_name ] = $this->request->field_value;

                $result = DB::table( $this->table )
                            ->where( "user_id", Auth::user()->id )
                            ->where("form", $this->registration_form)
                            ->update([
                                "data" => json_encode($data)
                            ]);

            } else {

                $data = [
                    "user_id" => Auth::user()->id,
                    "registration_start" => date('Y-m-d H:i:s'),
                    "fields_data" => [
                        $this->request->field_name => $this->request->field_value
                    ]
                ];

                $result = DB::table( $this->table )
                            ->insert([
                                "user_id" => Auth::user()->id,
                                "form" => $this->registration_form,
                                "data" => json_encode($data),
                                "status" => "pending"
                            ]);

            }

            $data = [];
            if( $this->request->field_name == "country" && $this->request->field_value == "PH"){
                $regions = DB::table("locations")
                            ->distinct("region")
                            ->select("region")
                            ->get();
                $data["regions"] = $regions;
            }
            elseif( $this->request->field_name == "region"){
                $provinces = DB::table("locations")
                            ->distinct("province")
                            ->select("province")
                            ->where("region", $this->request->field_value)
                            ->get();
                $data["provinces"] = $provinces;
            }
            elseif( $this->request->field_name == "province"){
                $cities = DB::table("locations")
                            ->distinct("lgu")
                            ->select("lgu")
                            ->where("province", $this->request->field_value)
                            ->get();
                $data["cities"] = $cities;
            }

            return [
                "request" => $this->request->all(),
                "data" => $data,
            ];

        } else {

            return "Table Not Configured";

        }

    }

    public function FieldMonitorMulti() {

        if($this->table !== null ){

            $result = DB::table( $this->table )
                        ->where("user_id", Auth::user()->id)
                        ->where("form", $this->registration_form)
                        ->get();

            if( count( $result ) > 0 ){

                $data = json_decode($result[0]->data, true);

                if(array_key_exists( $this->request->field_group, $data["fields_data"] )){

                    $field_group = $data["fields_data"][ $this->request->field_group ];

                    $field_group_counter = $field_group["counter"];
                    $field_group_fields = $field_group["fields"];

                    foreach( $field_group_fields as $key => $val ){
                        if( $this->request->field_group_id == $val["id"] ) {
                            $data[ "fields_data" ][ $this->request->field_group ][ "fields" ][ $key ]["fields"][ $this->request->field_name ] = $this->request->field_value;
                            break;
                        }
                    }

                } else {

                    $field_multi = [
                        "counter" => 1,
                        "fields" => [
                            [
                                "id" => 0,
                                "fields" => [
                                    $this->request->field_name => $this->request->field_value
                                ]
                            ]
                        ]
                    ];

                    $data["fields_data"][ $this->request->field_group ] = $field_multi;

                }

                $result = DB::table( $this->table )
                            ->where( "user_id", Auth::user()->id )
                            ->where("form", $this->registration_form)
                            ->update([
                                "data" => json_encode($data)
                            ]);

                return $data;

            } else {

                $data = [
                    "user_id" => Auth::user()->id,
                    "registration_start" => date('Y-m-d H:i:s'),
                    "fields_data" => [
                        $this->request->field_group => [
                            "counter" => 1,
                            "fields" => [
                                [
                                    "id" => 0,
                                    "fields" => [
                                        $this->request->field_name => $this->request->field_value
                                    ]
                                ]
                            ]
                        ]
                    ]
                ];


                $result = DB::table( $this->table )
                            ->where( "user_id", Auth::user()->id )
                            ->insert([
                                "user_id" => Auth::user()->id,
                                "form" => $this->registration_form,
                                "data" => json_encode($data),
                                "status" => "pending"
                            ]);

                return $data;

            }

            return $this->request;

        } else {

            return "Table Not Configured";

        }


    }


    public function FieldGroupAdd(){

        $db_data = DB::table( $this->table )
                    ->where("form", $this->registration_form )
                    ->where("status", "pending")
                    ->where("user_id", Auth::user()->id)
                    ->first();

        $data = json_decode($db_data->data, true);

        $counter = $data["fields_data"][$this->request->fieldgroup_name]["counter"];
        $data["fields_data"][$this->request->fieldgroup_name]["counter"] = $counter + 1;
        $data["fields_data"][$this->request->fieldgroup_name]["fields"][] = [
            "id" => count($data["fields_data"][$this->request->fieldgroup_name]["fields"]),
            "fields" => []
        ];

        $db_data = DB::table( $this->table )
                    ->where("form", $this->registration_form )
                    ->where("status", "pending")
                    ->where("user_id", Auth::user()->id)
                    ->update([
                        "data" => $data
                    ]);


        return $counter;

    }

}



