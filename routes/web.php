<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
})->middleware("guest");

Route::post('/login', "LoginController@login");

Route::get("/logout", "LoginController@logout")->middleware("auth")->name("logout");

Route::get('/home', function(){
    return view("home");
})->middleware("auth");

Route::get("services", "ServiceController@index")->name("services")->middleware("auth");
Route::get("services/fetch/{page}", "ServiceController@fetch")->middleware("auth");
Route::post("services/mark-as-seen", "ServiceController@markSeen")->middleware("auth");
Route::post("services/delete", "ServiceController@delete")->middleware("auth");

Route::get("lawyers", "LawyerContactController@index")->name("lawyers")->middleware("auth");
Route::get("lawyers/fetch/{page}", "LawyerContactController@fetch")->middleware("auth");
Route::post("lawyers/delete", "LawyerContactController@delete")->middleware("auth");

Route::get("appointments", "AppointmentController@index")->name("appointments")->middleware("auth");
Route::get("appointments/fetch/{page}", "AppointmentController@fetch")->middleware("auth");
Route::post("appointments/update", "AppointmentController@update")->middleware("auth");

Route::post("/confirmation", "DicomController@confirmation");
Route::post("/return", "DicomController@return");
