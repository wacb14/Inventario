<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveResponsableRequest extends FormRequest
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
            'nombres'=>'required|max:50',
            'apellidos'=>'required|max:50',
            'cargo'=>'required|max:100',
            'modalidad'=>'required|max:20'            
        ];
    }
    public function messages(){
        return [];
    }
}
