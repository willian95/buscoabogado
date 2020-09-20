<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;

class LawyerContactController extends Controller
{
    
    function contact(ServiceRequest $request){

        try{

            $messageMail =  "<p><strong>Nombre: </strong>".$request->name."</p>".
                            "<p><strong>RUT: </strong>".$request->rut."</p>".
                            "<p><strong>Especialidad: </strong>".$request->specialty."</p>".
                            "<p><strong>Correo: </strong>".$request->email."</p>".
                            "<p><strong>Teléfono: </strong>".$request->phone."</p>".
                            "<p><strong>Fecha de egreso: </strong>".$request->graduated_date."</p>";

            $data = ["messageMail" => $messageMail, "title" => "Te ha contactado un abogado"];
            $to_name = "Admin";
            $to_email = env('MAIL_FROM_ADDRESS');

            \Mail::send("emails.main", $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject("Te ha contactado un abogado!");
                $message->from( env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });

            return response()->json(["success" => true, "msg" => "Tu solicitud ha sido enviado, te contactaremos en breve"]);

        }catch(\Exception $e){  

            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine(), "msg" => "Ha ocurrido un problema"]);
        }

    }

}
