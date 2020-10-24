<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ForensicPracticeController extends Controller
{
    function index(){
        $fileArray = [];
        $files = Storage::files('/forensic/contracts');

        foreach($files as $file){
            array_push($fileArray, $file);
        }

        return response()->json(["files" => $fileArray]);
    }
}
