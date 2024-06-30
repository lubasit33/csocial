<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use App\Models\Avalista;
use App\Models\Associado;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\ContaStoreValidationRequest;
use App\Http\Requests\ContaUpdateValidationRequest;
use App\Http\Requests\TotalDepositoValidationRequest;
use App\Models\Movimento;

class ContaController extends Controller
{
    public function index()
    {
        return view('app.contas.index', [
            'contas' => Conta::orderBy('id', 'desc')->get(),
        ]);
    }

    public function create()
    {
        return view('app.contas.create', [
            'associados' => Associado::all(),
            'avalistas' => Avalista::all(),
        ]);
    }

    public function store(ContaStoreValidationRequest $request)
    {
        Conta::create($request->all());

        return redirect()->route('conta.index')
            ->with('success', 'Conta criada com sucesso!');
    }

    public function show(Conta $conta)
    {
        $conta = $conta::with([
            'oTitular.contas',
            'avalista',
            'movimentos.categoria',
        ])->where('id', $conta->id)
          ->first();

        return view('app.contas.show', compact('conta'));
    }

    public function edit(Conta $conta)
    {
        return view('app.contas.edit', [
            'conta' => $conta,
            'avalistas' => Avalista::all(),
            'associados' => Associado::all(),
        ]);
    }

    public function update(ContaUpdateValidationRequest $request, Conta $conta)
    {
        $conta->update($request->all());

        return redirect()->route('conta.index')
            ->with('success', 'Conta actualizada com sucesso!');
    }

    public function consultarTotalDeposito(Conta $conta)
    {
        return view('app.contas.depositos.consultar', [
            'conta' => $conta,
        ]);
    }

    public function totalDeposito(TotalDepositoValidationRequest $request, Conta $conta)
    {
        $depositos = Movimento::where('conta_id', $conta->id)
            ->where('categoria_id', 1)
            ->whereBetween('data_movimento', [$request->data_inicio, $request->data_fim]);

        $todosDepositos = $depositos->get();
        $depositos = $depositos->pluck('valor')->sum();

        return view('app.contas.depositos.consultar', [
            'conta' => $conta,
            'todosDepositos' => $todosDepositos,
            'depositos' => $depositos,
            'dataInicio' => $request->data_inicio,
            'dataFim' => $request->data_fim,
        ]);
    }

}
