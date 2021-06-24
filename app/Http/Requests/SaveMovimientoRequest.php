<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveMovimientoRequest extends FormRequest
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
            'idbien'=>'required|numeric',
            'fecha'=>'required|date',
            'idservicio'=>'required|numeric',
            'motivo'=>'required',
            'observaciones'=>'required'            
        ];
    }
    public function messages()
    {
        return [];
    }
}
