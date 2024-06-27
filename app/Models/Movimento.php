<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor',
        'data_movimento',
        'conta_id',
        'categoria_id',
    ];

    public function dataMovimento()
    {
        return date_format(date_create($this->data_movimento), 'd/m/Y');
    }

    public function conta()
    {
        return $this->belongsTo(Conta::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}
