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
        
        $response = Http::get(env('FLOW_URL').'payment/getStatus', [
            "apiKey" => env('FLOW_API_KEY'),
            "token" => $request->token,
            "s" => $signature
        ]);

        $data = json_decode($response->body());

        $payment = new Payment;
        $payment->token = $request->token;
        $payment->status = $data->status;
        $payment->save();

        return view("confirmation", ["payment" => $payment]);

    }

    function check(Request $request){
        
        if(Payment::where("token", $request->token)->count() > 0){

            return response()->json(["exists" => true]);

        }else{
            return response()->json(["exists" => false]);
        }

    }

    function complete(Request $request){

        if(Payment::where("token", $request->token)->first()){

            $payment = Payment::where("token", $request->token)->first();
            $payment->name = $request->name;
            $payment->email = $request->email;
            $payment->phone = $request->phone;
            $payment->rut = $request->rut;
            $payment->update();
            
        }

        return response()->json(["success" => true]);

    }

}
