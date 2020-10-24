<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ForensicPracticeController extends Controller
{
    function index(){
        $fileArray = [];
        $files = Storage::files('/forensic/contracts');

        return response()->json(["files" => $files]);
    }
}
