<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TotalDepositoValidationRequest extends FormRequest
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
        $dataAberturaConta = $this->route('conta')->data_abertura;

        $data_inicio = $this->all()['data_inicio'];
        $today = date_format(date_create(now()), 'Y-m-d');

        return [
            'data_inicio' => "bail|required|date|after_or_equal:{$dataAberturaConta}|before_or_equal:data_fim",
            'data_fim' => "bail|required_if:data_inicio,{$data_inicio}|date|after_or_equal:data_inicio|before_or_equal:{$today}",
        ];
    }

}
