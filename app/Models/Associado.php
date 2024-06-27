<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'data_nascimento',
        'genero',
        'residencia',
    ];

    public function genero()
    {
        return $this->genero ? 'feminino' : 'masculino';
    }

    public function dataNascimento()
    {
        return date_format(date_create($this->data_nascimento), 'd/m/Y');
    }

    public function idade()
    {
        return date_format(date_create(now()), 'Y') - date_format(date_create($this->data_nascimento), 'Y');
    }

    public function contas()
    {
        return $this->hasMany(Conta::class, 'titular', 'id');
    }

}
