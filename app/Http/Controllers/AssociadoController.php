<?php

namespace App\Http\Controllers;

use App\Models\Associado;
use Illuminate\Http\Request;
use App\Http\Requests\AssociadoStoreValidationRequest;
use App\Http\Requests\AssociadoUpdateValidationRequest;

class AssociadoController extends Controller
{
    public function search(Request $request)
    {
        $associados = Associado::where('nome', 'like', "%{$request->search}%")
            ->orWhere('bi', $request->search)
            ->orderBy('id', 'desc')
            ->get();

        return view('app.associados.index', [
            'associados' => $associados,
        ]);
    }

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

    public function store(AssociadoStoreValidationRequest $request)
    {
        $associado = new Associado();

        $associado->nome = $request->nome;
        $associado->bi = $request->bi;
        $associado->data_nascimento = $request->data_nascimento;
        $associado->genero = $request->genero;
        $associado->residencia = $request->residencia;

        if ($request->file('imagem')) {
            $file = $request->file('imagem');
            $fileName = date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('upload/associadoimagens'), $fileName);
            $associado->imagem = $fileName;
        }

        $associado->save();

        return redirect()->route('associado.index')
            ->with('success', 'Associado cadastrado com sucesso!');
    }

    public function show(Associado $associado)
    {
        $associado = $associado::with(['contas'])
            ->where('id', $associado->id)
            ->first();

        return view('app.associados.show', compact('associado'));
    }

    public function edit(Associado $associado)
    {
        return view('app.associados.edit', compact('associado'));
    }

    public function update(AssociadoUpdateValidationRequest $request, Associado $associado)
    {
        $associado->nome = $request->nome;
        $associado->bi = $request->bi;
        $associado->data_nascimento = $request->data_nascimento;
        $associado->genero = $request->genero;
        $associado->residencia = $request->residencia;

        if ($request->file('imagem')) {
            $file = $request->file('imagem');
            $fileName = date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('upload/associadoimagens'), $fileName);

            if (!is_null($associado->imagem) && !empty($associado->imagem)) {
                $filePath = "upload/associadoimagens/{$associado->imagem}";
                if (file_exists($filePath)) unlink(public_path($filePath));
            }

            $associado->imagem = $fileName;
        }

        $associado->save();

        return redirect()->route('associado.index')
            ->with('success', 'Associado actualizado com sucesso!');
    }

}
