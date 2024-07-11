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

        $avalista = new Avalista();

        $avalista->nome = $request->nome;
        $avalista->bi = $request->bi;
        $avalista->data_inicio_funcoes = $request->data_inicio_funcoes;
        $avalista->salario = $request->salario;
        $avalista->local_trabalho = $request->local_trabalho;

        if ($request->file('imagem')) {
            $file = $request->file('imagem');
            $fileName = date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('upload/avalistaimagens'), $fileName);
            $avalista->imagem = $fileName;
        }

        $avalista->save();

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
        $avalista->nome = $request->nome;
        $avalista->bi = $request->bi;
        $avalista->data_inicio_funcoes = $request->data_inicio_funcoes;
        $avalista->salario = $request->salario;
        $avalista->local_trabalho = $request->local_trabalho;

        if ($request->file('imagem')) {
            $file = $request->file('imagem');
            $fileName = date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('upload/avalistaimagens'), $fileName);

            if (!is_null($avalista->imagem) && !empty($avalista->imagem)) {
                $filePath = "upload/avalistaimagens/{$avalista->imagem}";
                if (file_exists($filePath)) unlink(public_path($filePath));
            }

            $avalista->imagem = $fileName;
        }

        $avalista->save();

        return redirect()->route('avalista.index')
            ->with('success', 'Avalista actualizado com sucesso!');
    }

}
