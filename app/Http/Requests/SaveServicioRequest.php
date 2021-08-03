<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveServicioRequest extends FormRequest
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
            'idservicio'=>'required',
            'nombre'=>'required|max:70',
            'idresponsable'=>'required|numeric',
            'fecha_inicio'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'nombre.unique'=>'Un servicio con este nombre ya ha sido registrado. Ingrese un nombre nuevo o cambie el responsable en "Nuevo Responsable"'
        ];
    }
}
