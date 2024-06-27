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
            'associados' => Associado::all(),
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
    
}
