<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use App\Models\Avalista;
use App\Models\Associado;
use App\Models\Categoria;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('app.dashboard.index', [
            'categorias' => Categoria::get()->count(),
            'associados' => Associado::orderBy('id', 'desc')->take(5)->get(),
            'contas' => Conta::get()->count(),
            'avalistas' => Avalista::get()->count(),
        ]);
    }

}
