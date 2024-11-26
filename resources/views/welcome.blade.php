@extends('layouts.app')
@section('inicio')
    <div class="container-fluid text-center mt-3 p-0">
        <img src="{{ asset('img/fondo.jpg') }}" alt="Imagen representativa" class="img-fluid" style="height: auto;">
        <h1 class="fw-bold nunito-font" style="margin-top: 120px; margin-bottom: 120px; color: #5BC5F2;">
            Gracias por participar de la elección de la reina departamental de la vendimia 2025
        </h1>


    </div>




    <div class="container-fluid">

        <div class="row justify-content-center pt-3 pb-3 text-white"
            style="background-image: url('{{ asset('img/ingreso.png') }}'); background-repeat: no-repeat; background-size: cover;">
            <h4 class="text-center mb-4">Seleccione la opción en la que desea realizar su voto</h4>
            <div class="col-md-auto mb-3 d-flex justify-content-center">
                <a role="button" class="btn btn-lg text-white"
                    href="
                @if (Auth::guard('admin')->check()) {{ route('resultados') }}
                @elseif(Auth::guard('web')->check()) {{ route('votacion') }}
                @else{{ route('login', ['type' => 'reinas']) }} @endif"
                    style="background-color: turquoise">
                    Votar Representante Distrital
                </a>
            </div>
            <div class="col-md-auto mb-3 d-flex justify-content-center">
                <a role="button" class="btn btn-lg text-white"
                    href="
                        @if (Auth::guard('admin')->check()) {{ route('resultados.cultores') }}
                        @elseif(Auth::guard('web')->check()) {{ route('votacion.cultores') }}
                        @else{{ route('login', ['type' => 'cultores']) }} @endif"
                    style="background-color: turquoise">
                    Votar Cultor del Trabajo
                </a>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-md-auto">
                <p class="fs-5">
                    En caso de no estar registrado
                    <a role="button" href="{{ route('register') }}" class="btn btn-lg text-white"
                        style="background-color: turquoise;">
                        Registrate acá
                    </a>
                </p>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-md-auto">
                <p class="fs-5">
                    ¿Olvidaste tu contraseña?
                    <a role="button"
                        href="https://sistemas.guaymallen.gob.ar/reseteovendimia/index.php?c=ResetPasswordController&a=index"
                        class="btn btn-lg text-white" style="background-color: turquoise;">
                        Presiona acá
                    </a>
                </p>
            </div>
        </div>

    </div>

    <div class="container-fluid" style="background-color: #8035DE; padding: 20px;">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($reinas as $reina)
                    <div class="col-md-4 mb-3">
                        <div class="card shadow">
                            <p class="fs-4 text-center fw-bold my-2" style="color: #8035DE !important;">{{ $reina->distritos->nombre }}</p>
                            {{-- <video controls poster="{{ asset('img/reinas/' . $reina->foto) }}">
                                <source src="{{ asset($reina->foto) }}" type="video/mp4">
                            </video> --}}
                            <img
                                src="{{ asset('img/reinas/' . $reina->foto) }}"
                                class="img-fluid rounded-top"
                                alt=""
                            />
                            <div class="card-body">
                                <h5 class="card-title fw-bold d-flex justify-content-center">{{ $reina->nombre }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
