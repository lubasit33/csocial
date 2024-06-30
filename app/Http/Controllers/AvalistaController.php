<?php

namespace App\Http\Controllers;

use App\Models\Avalista;
use App\Http\Requests\AvalistaStoreValidationRequest;
use App\Http\Requests\AvalistaUpdateValidationRequest;

class AvalistaController extends Controller
{
    public function index()
    {
        return view('app.avalistas.index', [
            'avalistas' => Avalista::orderBy('id', 'desc')->get(),
        ]);
    }

    public function create()
    {
        return view('app.avalistas.create');
    }

    public function store(AvalistaStoreValidationRequest $request)
    {
        Avalista::create($request->all());

        return redirect()->route('avalista.index')
            ->with('success', 'Avalista cadastrado com sucesso!');
    }

    public function show(Avalista $avalista)
    {
        $avalista = $avalista::with(['contas'])
            ->where('id', $avalista->id)
            ->first();

        return view('app.avalistas.show', compact('avalista'));
    }

    public function edit(Avalista $avalista)
    {
        return view('app.avalistas.edit', compact('avalista'));
    }

    public function update(AvalistaUpdateValidationRequest $request, Avalista $avalista)
    {
        $avalista->update($request->all());

        return redirect()->route('avalista.index')
            ->with('success', 'Avalista actualizado com sucesso!');
    }

}
