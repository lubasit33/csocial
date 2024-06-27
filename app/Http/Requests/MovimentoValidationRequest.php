<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovimentoValidationRequest extends FormRequest
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
            'valor' => 'bail|required|numeric|min:0',
            'data_movimento' => 'bail|required|date',
            'conta_id' => 'bail|required|integer|exists:contas,id',
            'categoria_id' => 'bail|required|integer|exists:categorias,id',
        ];
    }

}
