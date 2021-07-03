<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioRequest extends FormRequest
{
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
            'nombres'=>'required',
            'apellidos'=>'required',
            'usuario'=>'required',
            'tipo_usuario'=>'required'
        ];
    }
    public function messages(){
        /*return [
            'title.required'=>'Un titulo se requiere para guardar el libro',
            'description.required'=>'Se requiere una descripcion'
        ];*/
        return [];
    }
}
