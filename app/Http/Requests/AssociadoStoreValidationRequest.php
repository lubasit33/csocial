<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssociadoStoreValidationRequest extends FormRequest
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
        $this->all()['genero'] = $this->all()['genero'] ? true : false;

        return [
            'nome' => 'bail|required|string|min:3|max:100',
            'bi' => 'bail|required|string|min:14|max:14|unique:associados,bi|regex:/^[0-9]{9}[A-Z]{2}[0-9]{3}$/',
            'data_nascimento' => 'bail|required|date|before:2006-01-01|after:1900-01-01',
            'genero' => 'bail|required|boolean',
            'residencia' => 'bail|nullable|string|min:3|max:255',
            'imagem' => 'bail|nullable|file|mimes:jpg,jpeg,png|max:1024',
        ];
    }

}
