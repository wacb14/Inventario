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
            'cod_patrimonial'=>'required|numeric|unique:tbien,cod_patrimonial',
            'procedencia'=>'required|max:30',
            'nombre'=>'required|max:30',
            'cantidad'=>'required|numeric',
            'marca'=>'required|max:20',
            'modelo'=>'required|max:20',
            'num_serie'=>'required|max:20',
            'color'=>'required|max:255',
            'medidas'=>'required|max:30',
            'estado_conservacion'=>'required|max:30',
            'estado'=>'required|max:15',
            'observacion'=>'required|max:100',
            'fecha_adquisicion'=>'required|date',
            'fecha_ult_inventario'=>'required|date'
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
