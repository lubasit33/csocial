<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvalistaValidationRequest;
use App\Models\Avalista;
use Illuminate\Http\Request;

class AvalistaController extends Controller
{
    public function index()
    {
        return view('app.avalistas.index', [
            'avalistas' => Avalista::all(),
        ]);
    }

    public function create()
    {
        return view('app.avalistas.create');
    }

    public function store(AvalistaValidationRequest $request)
    {
        Avalista::create($request->all());

        return redirect()->route('avalista.index');
    }

    public function show(Avalista $avalista)
    {
        $avalista = $avalista::with(['contas'])->first();

        return view('app.avalistas.show', compact('avalista'));
    }

    public function edit(Avalista $avalista)
    {
        return view('app.avalistas.edit', compact('avalista'));
    }

    public function update(AvalistaValidationRequest $request, Avalista $avalista)
    {
        $avalista->update($request->all());

        return redirect()->route('avalista.index');
    }

}
