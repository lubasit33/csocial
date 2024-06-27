<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssociadoRequestValidation extends FormRequest
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
            'data_nascimento' => 'bail|required|date|after:1900-01-01',
            'genero' => 'bail|required|boolean',
            'residencia' => 'bail|nullable|string|min:3|max:255',
        ];
    }

}
