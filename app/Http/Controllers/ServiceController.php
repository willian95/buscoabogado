<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    
    function chooseService(ServiceRequest $request){

        try{

            $messageMail =  "<p><strong>Tipo de caso: </strong>".$request->client_case."</p>".
                            "<p><strong>Categoría: </strong>".$request->client_category."</p>".
                            "<p><strong>Nombre: </strong>".$request->client_name."</p>".
                            "<p><strong>RUT: </strong>".$request->client_rut."</p>".
                            "<p><strong>Ciudad: </strong>".$request->client_city."</p>".
                            "<p><strong>Comuna: </strong>".$request->client_commune."</p>".
                            "<p><strong>Correo: </strong>".$request->client_email."</p>".
                            "<p><strong>Teléfono: </strong>".$request->client_phone."</p>".
                            "<p><strong>Descripción del caso: </strong>".$request->client_description."</p>";

            $data = ["messageMail" => $messageMail, "title" => $request->client_name." ha solicitado un servicio"];
            $to_name = "Admin";
            $to_email = env('ADMIN_MAIL');

            \Mail::send("emails.main", $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject("¡Han solicitado un servicio!");
                $message->from( env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });

            return response()->json(["success" => true, "msg" => "Tu solicitud ha sido enviado, te contactaremos por correo en breve"]);

        }catch(\Exception $e){  

            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine(), "msg" => "Ha ocurrido un problema"]);
        }

    }

}
