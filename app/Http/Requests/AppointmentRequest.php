<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "date" => "required|date",
            "time" => "required",
            "name" => "required",
            "email" => "required|email",
            "phone" => "required"
        ];
    }

    public function messages()
    {
        return [
            "date.required" => "Debe seleccionar una fecha",
            "date.date" => "Debe elegir una fecha válida",
            "time.required" => "Hora es requerida",
            "name.required" => "Su nombre es requerido",
            "email.required" => "Su correo es requerido",
            "email.email" => "Su correo no es válido",
            "phone.required" => "Teléfono es requerido"
        ];
    }
}
