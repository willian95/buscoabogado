<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            "client_case" => "required",
            "client_category" => "required",
            "client_name" => "required",
            "client_rut"=> "required",
            "client_city"=> "required",
            "client_email"=> "required",
            "client_commune"=> "required",
            "client_phone"=> "required",
            "client_description"=> "required",
        ];
    }

    public function messages()
    {
        return [
            "client_case.required" => "Tipo de caso es requerido",
            "client_category.required" => "Categoría de caso es requerida",
            "client_name.required" => "Su nombre es requerido",
            "client_rut.required"=> "su RUT es requerido",
            "client_city.required"=> "Su ciudad es requerida",
            "client_commune.required"=> "Su comuna es requerida",
            "client_email.required"=> "Su email es requerido",
            "client_phone.required"=> "Su teléfono es requerido",
            "client_description.required"=> "La descripción de su caso es requerida"
        ];
    }
}
