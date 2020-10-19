<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AppointmentRequest;
use Carbon\Carbon;
use App\Appointment;

class AppointmentController extends Controller
{

    function index(){
        return view("appointments.index");
    }

    function fetch($page){

        try{

            $dataAmount = 20;
            $skip = ($page - 1) * $dataAmount;

            $appointments = Appointment::skip($skip)->take($dataAmount)->orderBy("id", "desc")->get();
            $appointmentsCount = Appointment::count();

            return response()->json(["success" => true, "appointments" => $appointments, "appointmentsCount" => $appointmentsCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor"]);

        }

    }

    function update(Request $request){

        try{

            $appointment = Appointment::where("id", $request->id)->first();
            $appointment->status = $request->status;
            $appointment->update();
            
            if($request->status == "Aprobado"){
                $title = "Cita aprobada";
                $messageMail =  "Hola ".$appointment->name.", hemos aceptado la cita para el ".$appointment->date." a las ".$appointment->time;
            }else if($request->status == "Rechazado"){
                $title = "Cita rechazada";
                $messageMail =  "Hola ".$appointment->name.", lamentamos informarte que no podemos atenderte el ".$appointment->date." a las ".$appointment->time;
            }

            $data = ["messageMail" => $messageMail, "title" => $title];
            $to_name = $appointment->name;
            $to_email = $appointment->email;

            \Mail::send("emails.main", $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject($title);
                $message->from( env('MAIL_FROM_ADDRESS'), env('ADMIN_MAIL'));
            });

            return response()->json(["success" => true, "msg" => "Se ha actualizado la cita, le enviaremos un correo al cliente"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor"]);

        }

    }
    
    function appointment(AppointmentRequest $request){

        try{

            $appointment = new appointment;
            $appointment->date = Carbon::parse($request->date)->format('d-m-Y');
            $appointment->time = Carbon::parse($request->time)->format('H:i');
            $appointment->name = $request->name;
            $appointment->email = $request->email;
            $appointment->phone = $request->phone;
            $appointment->save();

            $messageMail =  "<p><strong>Fecha: </strong>".Carbon::parse($request->date)->format('d-m-Y')."</p>".
                            "<p><strong>Hora: </strong>".Carbon::parse($request->time)->format('H:i')."</p>".
                            "<p><strong>Nombre: </strong>".$request->name."</p>".
                            "<p><strong>Correo: </strong>".$request->email."</p>".
                            "<p><strong>Teléfono: </strong>".$request->phone."</p>";

            $data = ["messageMail" => $messageMail, "title" => $request->name." ha solicitado una cita"];
            $to_name = "Admin";
            $to_email = env('ADMIN_MAIL');

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
