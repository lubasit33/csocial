<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContaUpdateValidationRequest extends FormRequest
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
        $conta_id = $this->route('conta')->id;

        return [
            'numero_conta' => "bail|required|string|min:11|max:11|unique:contas,numero_conta,{$conta_id}",
            'saldo' => 'bail|required|numeric',
            'data_abertura' => 'bail|required|date|after:1990-01-01',
            'titular' => 'bail|required|integer|exists:associados,id',
            'avalista_id' => 'bail|required|integer|exists:avalistas,id',
        ];
    }

}
