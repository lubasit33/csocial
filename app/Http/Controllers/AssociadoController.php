<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssociadoRequestValidation;
use App\Models\Associado;
use Illuminate\Http\Request;

class AssociadoController extends Controller
{
    public function index()
    {
        return view('app.associados.index', [
            'associados' => Associado::orderBy('id', 'desc')->get(),
        ]);
    }

    public function create()
    {
        return view('app.associados.create');
    }

    public function store(AssociadoRequestValidation $request)
    {
        Associado::create($request->all());

        return redirect()->route('associado.index');
    }

    public function show(Associado $associado)
    {
        $associado = $associado::with(['contas'])->get();

        return view('app.associados.show', compact('associado'));
    }

    public function edit(Associado $associado)
    {
        return view('app.associados.edit', compact('associado'));
    }

    public function update(AssociadoRequestValidation $request, Associado $associado)
    {
        $associado->update($request->all());

        return redirect()->route('associado.index');
    }

}
