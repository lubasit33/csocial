<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Conta;
use App\Models\Movimento;
use Illuminate\Http\Request;

class MovimentoController extends Controller
{
    public function index()
    {
        return view('app.movimentos.index', [
            'movimentos' => Movimento::all(),
        ]);
    }

    public function create()
    {
        return view('app.movimentos.create', [
            'contas' => Conta::all(),
            'categorias' => Categoria::all(),
        ]);
    }

}
