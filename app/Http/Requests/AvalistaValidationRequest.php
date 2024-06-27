<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvalistaValidationRequest extends FormRequest
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
            'nome' => 'bail|required|string|min:3|max:100',
            'data_inicio_funcoes' => 'bail|required|date|after:2001-01-01',
            'salario' => 'bail|required|numeric',
            'local_trabalho' => 'bail|required|string|min:3|max:255',
        ];
    }

}
