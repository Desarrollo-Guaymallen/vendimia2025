<div>
    <div class="container">
        <p class="fs-5">
            En las siguientes tarjetas, podrás visualizar un video con las candidatas que representan a cada distrito,
            en las que se podrá apreciar la visión de cada una de ellas, cómo aportarán al departamento y a sus
            distritos con un proyecto concreto, a realizar en un año y que tenga el foco puesto en las necesidades de
            los habitantes de la comuna.
            <br>
            Una de ellas va a representar al departamento en la Fiesta de la Vendimia 2025 y competir por la
            corona nacional.
            <br>
            Recordá que solo vas a poder votar <b>una vez.</b>
            <br>
        </p>
    </div>

    <div class="container-fluid" style="background-color: #8035DE; padding: 20px;">
        <div class="container">
            <div class="row justify-content-center">
                @if (isset($reinas))
                    @foreach ($reinas as $reina)
                        <div class="col-md-4 mb-3">
                            <div class="card shadow bg-body-tertiary rounded">
                                <p class="fs-4 text-center fw-bold my-2" style="color: #8035DE !important;">
                                    {{ $reina->distritos->nombre }}</p>
                                {{-- <video controls poster="{{ asset('img/reinas/' . $reina->miniatura) }}">
                                    <source src="{{ asset($reina->foto) }}" type="video/mp4">
                                </video> --}}
                                <img src="{{ asset('img/reinas/' . $reina->foto) }}" class="img-fluid rounded-top"
                                    alt="" style="height: 400px;" />

                                <div class="card-body">
                                    <h5 class="card-title fw-bold d-flex justify-content-center">{{ $reina->nombre }}

                                    </h5>
                                    {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional
                                content. This content is a little bit longer.</p> --}}
                                    @if (!$voto)
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn text-white"
                                                style="background-color: #5BC5F2; width: 200px; padding: 5px 10px; font-size: 16px;"
                                                wire:click="votar({{ $reina->id }})">
                                                Votar
                                            </button>


                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="row">
                        <div class="alert alert-primary" role="alert">
                            <strong>Atención!</strong> {{ $periodo_finalizado }}
                        </div>
                    </div>
                @endif

                {{-- <div class="col-md-4 mb-3">
            <div class="card">
                <p class="fs-5 text-center my-2">Colonia Segovia</p>
                <video controls>
                    <source src="{{ asset('reinas/video.mp4')}}" type="video/mp4">
                </video>
                <div class="card-body">
                    <h5 class="card-title">TITLE</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional
                        content. This content is a little bit longer.</p>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-lg text-white"
                            style="background-color: rebeccapurple;">
                            Votar
                        </button>
                    </div>
                </div>
            </div>
        </div> --}}
            </div>
        </div>
    </div>
    <script>
        Livewire.on('notificacion', (data) => {
            Swal.fire({
                icon: data.icon,
                // title: "Oops...",
                html: data.msj,
            });
            // console.log(data[0].icon);
        })
    </script>
</div>
