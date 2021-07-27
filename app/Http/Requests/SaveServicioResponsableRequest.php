<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveServicioResponsableRequest extends FormRequest
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
            'nombre'=>'required|max:70',
            'idresponsable'=>'required|numeric',
            'fecha_inicio'=>'required'
        ];
    }
    public function messages()
    {
        return [
        ];
    }
}
