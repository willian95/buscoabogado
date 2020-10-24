<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/dicom", "DicomController@checkout");

Route::post("/service", "ServiceController@chooseService");

Route::post("/lawyer-contact", "LawyerContactController@contact");

Route::post("/appointment", "AppointmentController@appointment");

Route::post("/dicom/token/check", "DicomController@check");

Route::post("/dicom/complete", "DicomController@complete");

Route::get("/forensic/practice", "ForensicPracticeController@index");
Route::post("/forensic/practice/search", "ForensicPracticeController@search");