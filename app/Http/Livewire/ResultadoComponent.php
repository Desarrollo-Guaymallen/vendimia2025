<?php

namespace App\Http\Livewire;

use App\Models\Distrital;
use App\Models\Reina;
use App\Models\User;
use Livewire\Component;

class ResultadoComponent extends Component
{
    public $categoria;
    public function render()
    {
        $total_votos = User::where('distrital', '!=', 0)->count();

        $votos = Distrital::leftjoin('residentes', 'distrital.id', '=', 'residentes.distrital')
            ->selectRaw("count(residentes.distrital) as voto_candidata, count(CASE WHEN residentes.tipo = 'comision' THEN 1 end) as voto_comision, 
                count(CASE WHEN residentes.tipo = 'vecino' THEN 1 end) as voto_vecino, 
            distrital.nombre, distrital.distrito")
            ->groupBy('distrital.nombre', 'distrital.distrito')
            ->orderByDesc('voto_candidata')
            ->get();

        $sql = Reina::leftjoin('residentes', 'reinas.id', '=', 'residentes.vendimia')
            ->selectRaw("count(residentes.distrital) as voto_candidata, count(CASE WHEN residentes.tipo = 'comision' THEN 1 end) as voto_comision, 
            distrital.nombre, distrital.distrito")
            ->groupBy('distrital.nombre', 'distrital.distrito')
            ->orderByDesc('voto_candidata')
            ->toSql();

        $total_publico = User::where('tipo', 'vecino')->where('distrital', '!=', 0)->count();
        $total_comision = User::where('tipo', 'comision')->where('distrital', '!=', 0)->count();

        // $resultados = $votos->union($comision)->get();

        return view('livewire.resultado-component', compact(
            'total_votos',
            'votos',
            'total_publico',
            'total_comision',
            'sql',
        ));
    }
}
