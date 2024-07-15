<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conta extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_conta',
        'saldo',
        'data_abertura',
        'titular',
        'avalista_id',
    ];

    public function dataAbertura()
    {
        return date_format(date_create($this->data_abertura), 'd/m/Y');
    }

    public function saldo()
    {
        return number_format($this->saldo, 2, ',', '.');
    }

    public function oTitular()
    {
        return $this->belongsTo(Associado::class, 'titular', 'id');
    }

    public function avalista()
    {
        return $this->belongsTo(Avalista::class);
    }

    public function movimentos()
    {
        return $this->hasMany(Movimento::class);
    }

}
