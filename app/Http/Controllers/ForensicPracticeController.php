<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ForensicPracticeController extends Controller
{
    function index(){
        $fileArray = [];
        $files = Storage::files('/forensic/contracts');

        $i = 0;
        foreach($files as $file){
           
            if($i >= 40){
                break;
            }
            
            $sanitizedFile = str_replace("forensic/contracts/", "", $file);
            $sanitizedFile = str_replace(".doc", "", $sanitizedFile);

            array_push($fileArray, $sanitizedFile);

            $i++;
        }

        return response()->json(["files" => $fileArray]);
    }

    function search(Request $request){

        $sanitizedRequest = strtoupper($request->stringQuery);
        $sanitizedRequest = str_replace("Á", "A", $sanitizedRequest);
        $sanitizedRequest = str_replace("É", "E", $sanitizedRequest);
        $sanitizedRequest = str_replace("Í", "I", $sanitizedRequest);
        $sanitizedRequest = str_replace("Ó", "O", $sanitizedRequest);
        $sanitizedRequest = str_replace("Ú", "U", $sanitizedRequest);

        $query = explode(" ", $sanitizedRequest);
        $files = Storage::files('/forensic/contracts');
        $filesArray = [];

        foreach($files as $file){

            foreach($query as $quer){

                $sanitizedFile = str_replace("forensic/contracts/", "", $file);
                $sanitizedFile = str_replace("Á", "A", $sanitizedFile);
                $sanitizedFile = str_replace("É", "E", $sanitizedFile);
                $sanitizedFile = str_replace("Í", "I", $sanitizedFile);
                $sanitizedFile = str_replace("Ó", "O", $sanitizedFile);
                $sanitizedFile = str_replace("Ú", "U", $sanitizedFile);

                if(strpos($sanitizedFile, $quer)){
                    array_push($filesArray, $sanitizedFile);
                }

            }

        }

        return response()->json(["files" => $filesArray]);
        /*foreach($files as $file){
           
            
        }*/


    }

}
