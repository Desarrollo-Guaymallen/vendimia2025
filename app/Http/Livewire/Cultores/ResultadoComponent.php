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

        $total_categoria_artes_gral = User::where('artes', '!=', 0)->count('artes');
        $total_categoria_educacion_gral = User::where('educacion', '!=', 0)->count('educacion');
        $total_categoria_salud_gral = User::where('salud', '!=', 0)->count('salud');
        $total_categoria_deportes_gral = User::where('deportes', '!=', 0)->count('deportes');
        $total_categoria_laborsocial_gral = User::where('laborsocial', '!=', 0)->count('laborsocial');
        $total_categoria_economia_gral = User::where('economia', '!=', 0)->count('economia');

        $resultados_artes_gral = User::crossJoin('cultores')
            ->select(DB::raw('count(residentes.artes) as count_artes_gral'), 'cultores.nombre')
            ->whereColumn('residentes.artes', '=', 'cultores.id')
            ->groupBy('cultores.id')
            ->get();

        $resultados_educacion_gral = DB::table('residentes')
            ->crossJoin('cultores')
            ->select(DB::raw('count(residentes.educacion) as count_educacion_gral'), 'cultores.nombre')
            ->whereColumn('residentes.educacion', '=', 'cultores.id')
            ->groupBy('cultores.id')
            ->get();

        $resultados_salud_gral = DB::table('residentes')
            ->crossJoin('cultores')
            ->select(DB::raw('count(residentes.salud) as count_salud_gral'), 'cultores.nombre')
            ->whereColumn('residentes.salud', '=', 'cultores.id')
            ->groupBy('cultores.id')
            ->get();

        $resultados_deportes_gral = DB::table('residentes')
            ->crossJoin('cultores')
            ->select(DB::raw('count(residentes.deportes) as count_deportes_gral'), 'cultores.nombre')
            ->whereColumn('residentes.deportes', '=', 'cultores.id')
            ->groupBy('cultores.id')
            ->get();

        $resultados_laborsocial_gral = DB::table('residentes')
            ->crossJoin('cultores')
            ->select(DB::raw('count(residentes.laborsocial) as count_laborsocial_gral'), 'cultores.nombre')
            ->whereColumn('residentes.laborsocial', '=', 'cultores.id')
            ->groupBy('cultores.id')
            ->get();

        $resultados_economia_gral = DB::table('residentes')
            ->crossJoin('cultores')
            ->select(DB::raw('count(residentes.economia) as count_economia_gral'), 'cultores.nombre')
            ->whereColumn('residentes.economia', '=', 'cultores.id')
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
