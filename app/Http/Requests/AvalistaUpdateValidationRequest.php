<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvalistaUpdateValidationRequest extends FormRequest
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
        $avalista_id = $this->route('avalista')->id;

        return [
            'nome' => 'bail|required|string|min:3|max:100',
            'bi' => "bail|required|string|min:14|max:14|unique:associados,bi,{$avalista_id}|regex:/^[0-9]{9}[A-Z]{2}[0-9]{3}$/",
            'data_inicio_funcoes' => 'bail|required|date|after:2001-01-01',
            'salario' => 'bail|required|numeric',
            'local_trabalho' => 'bail|required|string|min:3|max:255',
            'imagem' => 'bail|nullable|file|mimes:jpg,jpeg,png|max:1024',
        ];
    }

}
