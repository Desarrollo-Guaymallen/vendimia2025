@extends('layouts.app')
@section('content')
    <div>
        @if (isset($reinas))
            @livewire('votacion-component', ['reinas' => $reinas, 'periodo_finalizado' => null])
        @else
            @livewire('votacion-component', ['reinas' => null, 'periodo_finalizado' => $periodo_finalizado])
        @endif
    </div>
@endsection
