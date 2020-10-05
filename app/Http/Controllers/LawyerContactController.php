<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LawyerContactRequest;
use Carbon\Carbon;
use App\Lawyer;

class LawyerContactController extends Controller
{
    
    function index(){
        return view("lawyers.index");
    }

    function fetch($page){
        try{

            $dataAmount = 20;
            $skip = ($page - 1) * $dataAmount;

            $lawyers = Lawyer::skip($skip)->take($dataAmount)->get();
            $lawyersCount = Lawyer::count();

            return response()->json(["success" => true, "lawyers" => $lawyers, "lawyersCount" => $lawyersCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor"]);

        }
    }

    function contact(LawyerContactRequest $request){

        try{

            $lawyer = new Lawyer;
            $lawyer->name = $request->name;
            $lawyer->rut = $request->rut;
            $lawyer->specialty = $request->specialty;
            $lawyer->email = $request->email;
            $lawyer->phone = $request->phone;
            $lawyer->date = Carbon::parse($request->graduated_date)->format('d-m-Y');
            $lawyer->save();

            /*$messageMail =  "<p><strong>Nombre: </strong>".$request->name."</p>".
                            "<p><strong>RUT: </strong>".$request->rut."</p>".
                            "<p><strong>Especialidad: </strong>".$request->specialty."</p>".
                            "<p><strong>Correo: </strong>".$request->email."</p>".
                            "<p><strong>Teléfono: </strong>".$request->phone."</p>".
                            "<p><strong>Fecha de egreso: </strong>".Carbon::parse($request->graduated_date)->format('d/m/Y')."</p>";

            $data = ["messageMail" => $messageMail, "title" => "Te ha contactado un abogado"];
            $to_name = "Admin";
            $to_email = env('ADMIN_MAIL');

            \Mail::send("emails.main", $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject("Te ha contactado un abogado!");
                $message->from( env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });*/

            return response()->json(["success" => true, "msg" => "Tu solicitud ha sido enviado, te contactaremos en breve"]);

        }catch(\Exception $e){  

            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine(), "msg" => "Ha ocurrido un problema"]);
        }

    }

}
