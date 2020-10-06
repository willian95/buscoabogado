<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DicomController extends Controller
{
    function checkout(Request $request){

        $commerceOrder = rand(0, 9999); 
        $secretKey = env('FLOW_SECRET_KEY');
        $params = array( 
            "amount" => 4990,
            "apiKey" => env('FLOW_API_KEY'),
            "commerceOrder" => $commerceOrder,
            "email" => $request->email,
            "subject" => "Pago de informe comercial",
            "urlConfirmation" => url('/confirmation'),
            "urlReturn" => url('/return')
        ); 
        $keys = array_keys($params);
        sort($keys);
        
        $toSign = "";
        foreach($keys as $key) {
            $toSign .= $key . $params[$key];
        };
        
        $signature = hash_hmac('sha256', $toSign , $secretKey);

        dd(env('FLOW_URL'));

        $response = Http::asForm()->post(env('FLOW_URL').'payment/create', [
            "amount" => 4990,
            "apiKey" => env('FLOW_API_KEY'),
            "commerceOrder" => strval($commerceOrder),
            "email" => $request->email,
            "subject" => "Pago de informe comercial",
            "urlConfirmation" => url('/confirmation'),
            "urlReturn" => url('/return'),
            "s" => $signature
        ]);
        
        return response()->json($response->body());

    }

    function confirmation(){

    }

    function return(){
        
    }

}
