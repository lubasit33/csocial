<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovimentoValidationRequest;
use App\Models\Categoria;
use App\Models\Conta;
use App\Models\Movimento;
use Illuminate\Http\Request;

class MovimentoController extends Controller
{
    public function index()
    {
        return view('app.movimentos.index', [
            'movimentos' => Movimento::with(['conta.oTitular', 'conta.avalista', 'categoria'])->get(),
        ]);
    }

    public function create()
    {
        return view('app.movimentos.create', [
            'contas' => Conta::all(),
            'categorias' => Categoria::all(),
        ]);
    }

    public function store(MovimentoValidationRequest $request)
    {
        Movimento::create($request->all());

        return redirect()->route('movimento.index')
            ->with('success', 'O movimento foi feito com sucesso!');
    }

}
