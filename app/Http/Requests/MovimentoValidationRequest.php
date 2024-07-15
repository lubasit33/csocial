<?php

namespace App\Http\Requests;

use App\Models\Categoria;
use App\Rules\MovimentoCheckRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

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
        $valor_minimo = $this->all()['categoria_id'] == 1 ? 5 : 1000;
        $valorMovimento = $this->all()['valor'];
        $tipoMovimentoId = $this->all()['categoria_id'];

        return [
            'valor' => "bail|required|numeric|min:{$valor_minimo}",
            'data_movimento' => 'bail|required|date',
            'conta_id' => [
                'bail',
                'required',
                'integer',
                'exists:contas,id',
                new MovimentoCheckRule($valorMovimento, $tipoMovimentoId),
            ],
            'categoria_id' => 'bail|required|integer|exists:categorias,id',
        ];
    }

    public function messages()
    {
        $tipo_movimento = Categoria::find($this->all()['categoria_id'])->nome;

        return [
            'valor.min' => "O valor mínimo para o {$tipo_movimento} é de :min",
        ];
    }

}
