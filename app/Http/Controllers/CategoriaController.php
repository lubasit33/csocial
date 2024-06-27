<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaValidationRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return view('app.categorias.index', [
            'categorias' => Categoria::orderBy('id', 'desc')->get(),
        ]);
    }

    public function create()
    {
        return view('app.categorias.create');
    }

    public function store(CategoriaValidationRequest $request)
    {
        Categoria::create($request->all());

        return redirect()->route('categoria.index');
    }

    public function edit(Categoria $categoria)
    {
        return view('app.categorias.edit', compact('categoria'));
    }

    public function update(CategoriaValidationRequest $request, Categoria $categoria)
    {
        $categoria->update($request->only(['nome']));

        return redirect()->route('categoria.index');
    }

}
