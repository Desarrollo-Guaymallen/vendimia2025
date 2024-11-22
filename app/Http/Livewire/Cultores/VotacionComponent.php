<?php

namespace App\Http\Livewire\Cultores;

use App\Models\Cultores;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VotacionComponent extends Component
{
    public $categoria;

    public function render()
    {
        $currentDate = Carbon::now();
        $startDate = Carbon::parse('2024-01-17 09:00:00');
        $endDate = Carbon::parse('2025-01-30 09:00:00');

        $voto = false;

        if ($currentDate->isBetween($startDate, $endDate)) {
            // Mostrar el formulario
            $cultores = Cultores::where('categoria', $this->categoria)->inRandomOrder()->get();

            switch ($this->categoria) {
                case 1:
                    if (User::where('dni', Auth::guard('web')->user()->dni)->where('artes_gral', 0)->first()) {
                        $voto = false;
                    } else {
                        $voto = true;
                    }
                    break;
                case 2:
                    if (User::where('dni', Auth::guard('web')->user()->dni)->where('educacion_gral', 0)->first()) {
                        $voto = false;
                    } else {
                        $voto = true;
                    }
                    break;
                case 3:
                    if (User::where('dni', Auth::guard('web')->user()->dni)->where('salud_gral', 0)->first()) {
                        $voto = false;
                    } else {
                        $voto = true;
                    }
                    break;
                case 4:
                    if (User::where('dni', Auth::guard('web')->user()->dni)->where('deportes_gral', 0)->first()) {
                        $voto = false;
                    } else {
                        $voto = true;
                    }
                    break;
                case 5:
                    if (User::where('dni', Auth::guard('web')->user()->dni)->where('laborsocial_gral', 0)->first()) {
                        $voto = false;
                    } else {
                        $voto = true;
                    }
                    break;
                case 6:
                    if (User::where('dni', Auth::guard('web')->user()->dni)->where('economia_gral', 0)->first()) {
                        $voto = false;
                    } else {
                        $voto = true;
                    }
                    break;
            }


            return view('livewire.cultores.votacion-component', compact('cultores', 'voto'));
        } else {
            // Fuera del período permitido, redirigir o mostrar un mensaje
            return view('livewire.cultores.votacion-component')->with('periodo_finalizado', 'El período de elección de cultores ha finalizado, Gracias por participar!');
        }
    }

    public function votar($id_cultor)
    {
        $user = User::where('dni', Auth::user()->dni)->first();
        $cultor_valid = Cultores::where('id', $id_cultor)->where('categoria_gral', $this->categoria)->first();
        if ($this->categoria == 1) {
            if ($cultor_valid) {
                if ($user->artes_gral == 0) {
                    $user->update([
                        'artes_gral' => $id_cultor,
                    ]);
                    $this->emit('notificacion', [
                        'icon' => 'success',
                        'msj' => 'El voto ha sido registrado correctamente<br>Su elección: ' . $cultor_valid->nombre,
                    ]);
                } else {
                    $this->emit('notificacion', [
                        'icon' => 'error',
                        'msj' => 'Usted ya ha votado en esta categoría',
                    ]);
                }
            } else {
                $this->emit('notificacion', [
                    'icon' => 'error',
                    'msj' => 'Ha ocurrido un error, intente nuevamente',
                ]);
            }
        } else if ($this->categoria == 2) {
            if ($cultor_valid) {
                if ($user->educacion_gral == 0) {
                    $user->update([
                        'educacion_gral' => $id_cultor,
                    ]);
                    $this->emit('notificacion', [
                        'icon' => 'success',
                        'msj' => 'El voto ha sido registrado correctamente<br>Su elección: ' . $cultor_valid->nombre,
                    ]);
                } else {
                    $this->emit('notificacion', [
                        'icon' => 'error',
                        'msj' => 'Usted ya ha votado en esta categoría',
                    ]);
                }
            } else {
                $this->emit('notificacion', [
                    'icon' => 'error',
                    'msj' => 'Ha ocurrido un error, intente nuevamente',
                ]);
            }
        } else if ($this->categoria == 3) {
            if ($cultor_valid) {
                if ($user->salud_gral == 0) {
                    $user->update([
                        'salud_gral' => $id_cultor,
                    ]);
                    $this->emit('notificacion', [
                        'icon' => 'success',
                        'msj' => 'El voto ha sido registrado correctamente<br>Su elección: ' . $cultor_valid->nombre,
                    ]);
                } else {
                    $this->emit('notificacion', [
                        'icon' => 'error',
                        'msj' => 'Usted ya ha votado en esta categoría',
                    ]);
                }
            } else {
                $this->emit('notificacion', [
                    'icon' => 'error',
                    'msj' => 'Ha ocurrido un error, intente nuevamente',
                ]);
            }
        } else if ($this->categoria == 4) {
            if ($cultor_valid) {
                if ($user->deportes_gral == 0) {
                    $user->update([
                        'deportes_gral' => $id_cultor,
                    ]);
                    $this->emit('notificacion', [
                        'icon' => 'success',
                        'msj' => 'El voto ha sido registrado correctamente<br>Su elección: ' . $cultor_valid->nombre,
                    ]);
                } else {
                    $this->emit('notificacion', [
                        'icon' => 'error',
                        'msj' => 'Usted ya ha votado en esta categoría',
                    ]);
                }
            } else {
                $this->emit('notificacion', [
                    'icon' => 'error',
                    'msj' => 'Ha ocurrido un error, intente nuevamente',
                ]);
            }
        } else if ($this->categoria == 5) {
            if ($cultor_valid) {
                if ($user->laborsocial_gral == 0) {
                    $user->update([
                        'laborsocial_gral' => $id_cultor,
                    ]);
                    $this->emit('notificacion', [
                        'icon' => 'success',
                        'msj' => 'El voto ha sido registrado correctamente<br>Su elección: ' . $cultor_valid->nombre,
                    ]);
                } else {
                    $this->emit('notificacion', [
                        'icon' => 'error',
                        'msj' => 'Usted ya ha votado en esta categoría',
                    ]);
                }
            } else {
                $this->emit('notificacion', [
                    'icon' => 'error',
                    'msj' => 'Ha ocurrido un error, intente nuevamente',
                ]);
            }
        } else if ($this->categoria == 6) {
            if ($cultor_valid) {
                if ($user->economia_gral == 0) {
                    $user->update([
                        'economia_gral' => $id_cultor,
                    ]);
                    $this->emit('notificacion', [
                        'icon' => 'success',
                        'msj' => 'El voto ha sido registrado correctamente<br>Su elección: ' . $cultor_valid->nombre,
                    ]);
                } else {
                    $this->emit('notificacion', [
                        'icon' => 'error',
                        'msj' => 'Usted ya ha votado en esta categoría',
                    ]);
                }
            } else {
                $this->emit('notificacion', [
                    'icon' => 'error',
                    'msj' => 'Ha ocurrido un error, intente nuevamente',
                ]);
            }
        }
        // $user->update([
        //     'artes' => $id_cultor,
        //     'educacion' => $id_cultor,
        //     'artes' => $id_cultor,
        //     'salud' => $id_cultor,
        //     'deportes' => $id_cultor,
        //     'labor_social' => $id_cultor,
        //     'economia' => $id_cultor,
        // ]);
    }
}
