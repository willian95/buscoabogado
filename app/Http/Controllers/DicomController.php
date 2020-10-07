<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Payment;

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

        //return response()->json(env('FLOW_URL'));

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

    function confirmation(Request $request){

        //dd($request->all());

    }

    function return(Request $request){
        
        //dd($request->token[0], $request->token);

        //payment/getStatus
        $secretKey = env('FLOW_SECRET_KEY');
        $params = array( 
            "apiKey" => env('FLOW_API_KEY'),
            "token" => $request->token,
        ); 
        $keys = array_keys($params);
        sort($keys);
        
        $toSign = "";
        foreach($keys as $key) {
            $toSign .= $key . $params[$key];
        };
        
        $signature = hash_hmac('sha256', $toSign , $secretKey);
        dd(env('FLOW_API_KEY'), $request->token);
        $response = Http::post(env('FLOW_URL').'payment/getStatus', [
            "apiKey" => env('FLOW_API_KEY'),
            "token" => $request->token,
            "s" => $signature
        ]);

        /*$payment = new Payment;
        $payment->token = $request->token;
        $payment->save();*/

        dd(json_decode($response->body()));

        return view("confirmation");

    }

    function check(Request $request){
        
        if(Payment::where("token", $request->token)->count() > 0){

            return response()->json(["exists" => true]);

        }else{
            return response()->json(["exists" => false]);
        }

    }

}
