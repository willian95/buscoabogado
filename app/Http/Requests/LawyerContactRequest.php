<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LawyerContactRequest extends FormRequest
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
            "name" => "required",
            "rut"=> "required",
            "specialty"=> "required",
            "email"=> "required",
            "graduated_date"=> "required|date",
            "phone"=> "required",
            "city" => "required"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Su nombre es requerido",
            "rut.required"=> "su RUT es requerido",
            "specialty.required"=> "Su especialidad es requerida",
            "commune.required"=> "Su comuna es requerida",
            "phone.required"=> "Su teléfono es requerido",
            "graduated_date.required"=> "Su fecha de egreso es requerido",
            "graduated_date.date"=> "Su fecha de egreso no es válida",
            "city.required" => "Ciudad es requerida"
        ];
    }

}
