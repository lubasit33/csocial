<?php

namespace App\Rules;

use App\Models\Conta;
use Illuminate\Contracts\Validation\Rule;

class MovimentoCheckRule implements Rule
{
    private $valorMovimento;
    private $tipoMovimentoId;
    private $conta;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($valor, $tipoId)
    {
        $this->valorMovimento = $valor;
        $this->tipoMovimentoId = $tipoId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->conta = Conta::find($value);

        if ($this->tipoMovimentoId == 2
            && $this->valorMovimento > $this->conta->saldo) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "O valor máximo que pode ser levantado para essa conta é de {$this->conta->saldo()}";
    }

}
