<?php

namespace App\Http\Controllers;

use App\Models\Distrital;
use App\Models\Reina;
use App\Models\Votacion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VotacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentDate = Carbon::now();
        $startDate = Carbon::parse('2024-11-14 09:00:00');
        $endDate = Carbon::parse('2025-11-20 23:00:00');
        
        if ($currentDate->isBetween($startDate, $endDate)) {
            $reinas = Distrital::inRandomOrder()->get();
            return view('votacion.index', compact('reinas'));
        } else {
            // Fuera del período permitido, redirigir o mostrar un mensaje
            return view('votacion.index')->with('periodo_finalizado', 'El período de elección de la Representante Departamental ha finalizado, Gracias por participar!');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Votacion $votacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Votacion $votacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Votacion $votacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Votacion $votacion)
    {
        //
    }
}
