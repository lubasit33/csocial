<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avalista extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'bi',
        'data_inicio_funcoes',
        'salario',
        'local_trabalho',
    ];

    public function dataInicioFuncoes()
    {
        return date_format(date_create($this->data_inicio_funcoes), 'd/m/Y');
    }

    public function contas()
    {
        return $this->hasMany(Conta::class);
    }

}
