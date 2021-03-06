<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SaveUsuarioRequest extends FormRequest
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
            'nombres'=>'required|max:255',
            'apellidos'=>'required|max:255',
            'usuario'=>'required|unique:users,usuario|max:255',
            'tipo_usuario'=>'required|max:255',
            'password'=>'required|confirmed|min:8',
            'password_confirmation'=>'required'
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
