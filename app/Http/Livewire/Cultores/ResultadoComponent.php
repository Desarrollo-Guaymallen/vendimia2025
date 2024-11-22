<?php

namespace App\Http\Livewire\Cultores;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ResultadoComponent extends Component
{
    public $categoria;

    public function render()
    {
        $total_categoria = '';
        $resultados = '';

        $total_categoria_artes_gral = User::where('artes_gral', '!=', 0)->count('artes_gral');
        $total_categoria_educacion_gral = User::where('educacion_gral', '!=', 0)->count('educacion_gral');
        $total_categoria_salud_gral = User::where('salud_gral', '!=', 0)->count('salud_gral');
        $total_categoria_deportes_gral = User::where('deportes_gral', '!=', 0)->count('deportes_gral');
        $total_categoria_laborsocial_gral = User::where('laborsocial_gral', '!=', 0)->count('laborsocial_gral');
        $total_categoria_economia_gral = User::where('economia_gral', '!=', 0)->count('economia_gral');

        $resultados_artes_gral = DB::table('residentes')
            ->crossJoin('cultores')
            ->select(DB::raw('count(residentes.artes_gral) as count_artes_gral'), 'cultores.nombre')
            ->whereColumn('residentes.artes_gral', '=', 'cultores.id')
            ->groupBy('cultores.id')
            ->get();

        $resultados_educacion_gral = DB::table('residentes')
            ->crossJoin('cultores')
            ->select(DB::raw('count(residentes.educacion_gral) as count_educacion_gral'), 'cultores.nombre')
            ->whereColumn('residentes.educacion_gral', '=', 'cultores.id')
            ->groupBy('cultores.id')
            ->get();

        $resultados_salud_gral = DB::table('residentes')
            ->crossJoin('cultores')
            ->select(DB::raw('count(residentes.salud_gral) as count_salud_gral'), 'cultores.nombre')
            ->whereColumn('residentes.salud_gral', '=', 'cultores.id')
            ->groupBy('cultores.id')
            ->get();

        $resultados_deportes_gral = DB::table('residentes')
            ->crossJoin('cultores')
            ->select(DB::raw('count(residentes.deportes_gral) as count_deportes_gral'), 'cultores.nombre')
            ->whereColumn('residentes.deportes_gral', '=', 'cultores.id')
            ->groupBy('cultores.id')
            ->get();

        $resultados_laborsocial_gral = DB::table('residentes')
            ->crossJoin('cultores')
            ->select(DB::raw('count(residentes.laborsocial_gral) as count_laborsocial_gral'), 'cultores.nombre')
            ->whereColumn('residentes.laborsocial_gral', '=', 'cultores.id')
            ->groupBy('cultores.id')
            ->get();

        $resultados_economia_gral = DB::table('residentes')
            ->crossJoin('cultores')
            ->select(DB::raw('count(residentes.economia_gral) as count_economia_gral'), 'cultores.nombre')
            ->whereColumn('residentes.economia_gral', '=', 'cultores.id')
            ->groupBy('cultores.id')
            ->get();

        return view(
            'livewire.cultores.resultado-component',
            compact(
                'total_categoria_artes_gral',
                'total_categoria_educacion_gral',
                'total_categoria_salud_gral',
                'total_categoria_deportes_gral',
                'total_categoria_laborsocial_gral',
                'total_categoria_economia_gral',
                'resultados_artes_gral',
                'resultados_educacion_gral',
                'resultados_salud_gral',
                'resultados_deportes_gral',
                'resultados_laborsocial_gral',
                'resultados_economia_gral',
            )
        );
    }

    public function updateData()
    {
        $this->dispatch('evento');
    }
}
