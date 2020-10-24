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
            
            array_push($fileArray, $file);

            $i++;
        }

        return response()->json(["files" => $fileArray]);
    }
}
