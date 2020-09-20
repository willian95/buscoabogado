<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AppointmentRequest;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    
    function appointment(AppointmentRequest $request){

        try{

            $messageMail =  "<p><strong>Fecha: </strong>".$request->date."</p>".
                            "<p><strong>Hora: </strong>".Carbon::parse($request->time)->format('H:i')."</p>".
                            "<p><strong>Nombre: </strong>".$request->name."</p>".
                            "<p><strong>Correo: </strong>".$request->email."</p>".
                            "<p><strong>Teléfono: </strong>".$request->phone."</p>";

            $data = ["messageMail" => $messageMail, "title" => $request->name." ha solicitado una cia"];
            $to_name = "Admin";
            $to_email = env('MAIL_FROM_ADDRESS');

            \Mail::send("emails.main", $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject("¡Han solicitado una cita!");
                $message->from( env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });

            return response()->json(["success" => true, "msg" => "Tu cita ha sido enviada, le responderemos a su correo en breve"]);

        }catch(\Exception $e){  

            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine(), "msg" => "Ha ocurrido un problema"]);
        }

    }

}
