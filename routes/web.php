<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use \App\Http\Controllers\AjaxHandler;




Route::get('/', function () {
    return view('index');
});

Route::get('/triskelions', function () {
    return view('triskelions');
});

Route::get('/chapters', function () {
    return view('chapters');
});

Route::get('/chapters/tgs-chapter-registration', function () {
    return view('tgs-chapter-registration');
});

Route::get('/triskelions/lady-triskelion-registration', function () {
    return view('lady-triskelion-registration');
});

Route::get('/chapters/chapter-history', function () {
    return view('chapter-history');
});

Route::get('/chapters/chapter-registration', function () {
    return view('chapter-registration');
});

Route::get('/chapters/new-chapter-application', function () {
    return view('new-chapter-application');
});

Route::get('/record-update', function () {
    return view('record-update');
});

Route::get('/record-update/chapter', function () {
    return view('record-update-chapter');
});
Route::get('/record-update/chapter/details', function () {
    return view('record-update-chapter-details');
});

Route::get('/record-update/chapter/registered', function () {

    $chapters = DB::table("chapters")
                ->where("user_id", 822)
                ->whereNotNull("chapter_serial_number")
                ->get();

    return view('record-update-chapter-registered', compact('chapters'));
});

Route::get('/record-update/chapter/triskelions', function () {
    return view('record-update-chapter-triskelions');
});

Route::get('/record-update/profile', function () {
    return view('record-update-profile');
});

Route::get('/triskelions/neophyte-application', function () {
    return view('neophyte-application');
});

Route::get('/triskelions/triskelion-registration', function () {
    return view('triskelion-registration');
});


Route::post('/ajax', [AjaxHandler::class, 'index']);
