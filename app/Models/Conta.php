<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conta extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_conta',
        'data_abertura',
        'titular',
        'avalista_id',
    ];

    public function associado()
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
