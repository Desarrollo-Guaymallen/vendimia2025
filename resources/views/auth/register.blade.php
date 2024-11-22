@extends('layouts.app')

@section('content')
    <div class="container-fluid px-5">
        @if (isset($periodo_finalizado))
            <div class="row">
                <div class="alert alert-primary" role="alert">
                    <strong>Atención!</strong> {{ $periodo_finalizado }}
                </div>

            </div>
        @else
            <div class="row justify-content-center align-items-center">
                <div class="col-md-4">
                    <p class="fs-6">
                        En caso de algún inconveniente, enviar un correo al <b>soportevendimia@guaymallen.gob.ar</b> con los
                        siguientes datos:
                    <ul>
                        <li>Nombre</li>
                        <li>Apellido</li>
                        <li>Número de DNI</li>
                        <li>Domicilio</li>
                        <li>Foto de la parte frontal y trasera del documento</li>
                        <li>Correo electrónico</li>
                    </ul>
                    Para poder registrar su usuario.
                    <br>
                    Se remitirá a la brevedad posible la respuesta a lo solicitado.
                    </p>
                    <p class="fs-6">
                        Si ya esta inscripto y no recuerda su contraseña presione aquí
                        <a role="button" class="btn text-white"
                            href="https://sistemas.guaymallen.gob.ar/reseteovendimia/index.php?c=ResetPasswordController&a=index"
                            style="background-color: turquoise;">
                            Recuperar contraseña
                        </a>
                    </p>
                </div>
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header text-white" style="background-color: rebeccapurple;">Formulario de
                            inscripción
                        </div>

                        <div class="card-body rounded">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="dni"
                                        class="col-md-4 col-form-label text-md-end">{{ __('DNI') }}</label>

                                    <div class="col-md-6">
                                        <input id="dni" type="number"
                                            class="form-control @error('dni') is-invalid @enderror" name="dni"
                                            value="{{ old('dni') }}" required autocomplete="dni" autofocus>

                                        @error('dni')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn text-white"
                                            style="background-color: rebeccapurple;">
                                            {{ __('Registrarme') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (session('registrado'))
            <div class="alert alert-success mt-3" role="alert">
                <strong>Hecho!</strong> {{ session('registrado') }}. <a class="link-primary"
                    href="{{ route('login') }}">Ir al ingreso</a>
            </div>
        @endif
        @if (session('noRegistrado'))
            <div class="alert alert-warning mt-3" role="alert">
                <strong>Atención</strong> {{ session('noRegistrado') }}
            </div>
        @endif
    </div>
@endsection
