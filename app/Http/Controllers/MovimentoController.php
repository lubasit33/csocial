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
        $conta = Conta::find($request->conta_id);

        $conta->update([
            'saldo' => $request->categoria_id == 1
                ? $conta->saldo + $request->valor : $conta->saldo - $request->valor,
        ]);

        Movimento::create([
            'valor' => $request->valor,
            'categoria_id' => $request->categoria_id,
            'conta_id' => $request->conta_id,
            'data_movimento' => $request->data_movimento,
        ]);

        return redirect()->route('movimento.index')
            ->with('success', 'O movimento foi feito com sucesso!');
    }

}
