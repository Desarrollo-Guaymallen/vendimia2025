<?php

namespace App\Http\Livewire;

use App\Models\Distrital;
use App\Models\Reina;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VotacionComponent extends Component
{

    // public $voto;

    public $reinas;
    public $periodo_finalizado;

    public function mount($reinas, $periodo_finalizado)
    {
        $this->reinas = $reinas;
        $this->periodo_finalizado = $periodo_finalizado;
    }

    public function render()
    {
        
            // Mostrar el formulario
            
            if (User::where('dni', Auth::guard('web')->user()->dni)->where('distrital', 0)->first()) {
                $voto = false;
            } else {
                $voto = true;
            }
            return view('livewire.votacion-component', compact('voto'));
        

        // $reinas = Reina::inRandomOrder()->get();
        // if (User::where('dni', Auth::guard('web')->user()->dni)->where('vendimia', 0)->first()) {
        //     $voto = false;
        // } else {
        //     $voto = true;
        // }
        // return view('livewire.votacion-component', compact('reinas', 'voto'));
    }

    public function votar($id_reina)
    {
        $reina_valida = Distrital::where('id', $id_reina)->first();
        $user = User::where('dni', Auth::user()->dni)->first();

        if ($reina_valida) {
            if ($user->distrital == 0) {
                $user->update([
                    'distrital' => $id_reina
                ]);
                $this->emit('notificacion', [
                    'icon' => 'success',
                    'msj' => 'El voto ha sido registrado correctamente<br>Su elección: ' . $reina_valida->nombre . ' (' . $reina_valida->distritos->nombre . ')',
                ]);
            } else {
                $this->emit('notificacion', [
                    'icon' => 'error',
                    'msj' => 'Usted ya ha votado en esta categoría!',
                ]);
            }
        } else {
            $this->emit('notificacion', [
                'icon' => 'error',
                'msj' => 'Ha ocurrido un error, intente nuevamente!',
            ]);
        }
    }
}
