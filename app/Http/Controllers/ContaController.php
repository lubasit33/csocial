<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use App\Models\Avalista;
use App\Models\Associado;
use Illuminate\Http\Request;
use App\Http\Requests\ContaStoreValidationRequest;
use App\Http\Requests\ContaUpdateValidationRequest;

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

        return redirect()->route('conta.index');
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

        return redirect()->route('conta.index');
    }

}
