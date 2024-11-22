@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center mb-3"
            style="background-image: url({{ asset('img/ingreso.png') }}); background-repeat: no-repeat; background-size: cover;">
            <div class="col-md-6">
                <div class="card border-0 text-white" style="background: none;">
                    {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="dni"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Usuario (DNI)') }}</label>

                                <div class="col-md-6">
                                    <input id="dni" type="text"
                                        class="form-control @error('dni') is-invalid @enderror" name="dni"
                                        value="{{ old('dni') }}" required autocomplete="email" autofocus>

                                    @error('dni')
                                        <span class="invalid-feedback text-white" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="clave"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="clave" type="password"
                                        class="form-control @error('clave') is-invalid @enderror" name="clave" required
                                        autocomplete="current-password">

                                    @error('clave')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn text-white"
                                        style="background-color:  #5BC5F2;">
                                        {{ __('Ingresar') }}
                                    </button>

                                    {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                                </div>
                            </div>
                            <input type="hidden" name="type" value="{{ $type }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="col-md-auto">
                <p class="fs-5">En caso de no estar registrado <a
                        href="{{ route('register') }}" class="btn text-dark"
                        style="background-color: turquoise;">Registrese aquí</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-auto">
                <p class="fs-5">
                    Votación del público
                    <br>
                    1. Registrate (es requisito excluyente tener DNI con domicilio en Guaymallén).
                    <br>
                    2. Votá a un candidata a través de la foto y frase que lo identifica (podés elegir solo <b>*una vez*</b>)
                </p>
            </div>
        </div>
    </div>
@endsection
