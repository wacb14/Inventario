<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveBienRequest extends FormRequest
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
            'idservicio'=>'required|numeric',
            'cod_patrimonial'=>'required|numeric',
            'procedencia'=>'required',
            'nombre'=>'required',
            'cantidad'=>'required|numeric',
            'marca'=>'required',
            'modelo'=>'required',
            'num_serie'=>'required',
            'color'=>'required',
            'medidas'=>'required',
            'estado_conservacion'=>'required',
            'estado'=>'required',
            'observacion'=>'required',
            'fecha_adquisicion'=>'required|date',
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
