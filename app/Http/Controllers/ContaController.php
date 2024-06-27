<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContaValidationRequest;
use App\Models\Associado;
use App\Models\Avalista;
use App\Models\Conta;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class ContaController extends Controller
{
    public function index()
    {
        return view('app.contas.index', [
            'contas' => Conta::all(),
        ]);
    }

    public function create()
    {
        return view('app.contas.create', [
            'associados' => Associado::all(),
            'avalistas' => Avalista::all(),
        ]);
    }

    public function store(ContaValidationRequest $request)
    {
        Conta::create($request->all());

        return redirect()->route('conta.index');
    }

}
