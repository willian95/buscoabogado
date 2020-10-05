<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Service;

class ServiceController extends Controller
{

    function index(){
        return view("services.index");
    }

    function fetch($page){

        try{

            $dataAmount = 20;
            $skip = ($page - 1) * $dataAmount;

            $cases = Service::skip($skip)->take($dataAmount)->orderBy("status")->get();
            $casesCount = Service::count();

            return response()->json(["success" => true, "cases" => $cases, "casesCount" => $casesCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor"]);

        }

    }
    
    function markSeen(Request $request){

        try{

            $service = Service::where("id", $request->id)->first();
            $service->status = "Visto";
            $service->update();

            return response()->json(["success" => true, "msg" => "Caso marcado como visto"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage()]);

        }

    }

    function delete(Request $request){

        try{

            $service = Service::where("id", $request->id)->first();
            $service->delete();

            return response()->json(["success" => true, "msg" => "Caso marcado como visto"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage()]);

        }

    }

    function chooseService(ServiceRequest $request){

        try{

            $service = new Service;
            $service->name = $request->client_name;
            $service->rut = $request->client_rut;
            $service->email = $request->client_email;
            $service->phone = $request->client_phone;
            $service->type = $request->client_category;
            $service->case = $request->client_case;
            $service->city = $request->client_city;
            $service->commune = $request->client_commune;
            $service->description = $request->client_description;
            $service->save();

            /*$messageMail =  "<p><strong>Tipo de caso: </strong>".$request->client_case."</p>".
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
            });*/

            return response()->json(["success" => true, "msg" => "Tu solicitud ha sido enviada, te contactaremos en breve"]);

        }catch(\Exception $e){  

            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine(), "msg" => "Ha ocurrido un problema"]);
        }

    }

}
