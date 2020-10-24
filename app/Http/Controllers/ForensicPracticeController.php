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
           
            if($i >= 20){
                break;
            }
            
            $sanitizedFile = str_replace("forensic/contracts/", "", $file);
            $sanitizedFile = str_replace(".doc", "", $sanitizedFile);

            array_push($fileArray, $sanitizedFile);

            $i++;
        }

        return response()->json(["files" => $fileArray]);
    }
}
