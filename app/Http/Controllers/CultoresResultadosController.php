<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CultoresResultadosController extends Controller
{
    public function index()
    {
        return view('cultores.resultados');
    }
}
