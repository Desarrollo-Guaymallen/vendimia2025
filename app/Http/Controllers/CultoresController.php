<?php

namespace App\Http\Controllers;

class CultoresController extends Controller
{
    public function index()
    {

        // Mostrar el formulario
        return view('cultores.index');
    }
}
