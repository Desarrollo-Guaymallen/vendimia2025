<div>
    <div class="row">
        <p class="fs-5">En la siguiente lista desplegable podrá ver los candidatos de los Cultores del Trabajo
            ordenados
            por categoría.
            <br>
            Solo habrá un ganador por categoría <b>(6 en total)</b>.
            <br>
            Los Cultores serán premiados en “Sueños de Vendimia”, la fiesta departamental en homenaje a Quino, que
            tendrá lugar el próximo 2 de febrero.
            <br>
            Puede votar <b>un candidato</b> por categoría.
            {{-- Los candidatos están ordenados aleatoriamente. --}}
        </p>
    </div>
    <div class="row">
        <div class="col-md-auto">
            <div class="mb-3">
                <label for="" class="form-label">Categorias de cultores</label>
                <select class="form-select" name="" id="" wire:model="categoria">
                    <option value="10" selected>Seleccione...</option>
                    <option value="1">Artes (visuales, plásticas, literarias, musicales, escénicas, gráficas,
                        textil)</option>
                    <option value="2">Educación</option>
                    <option value="3">Salud</option>
                    <option value="4">Deportes</option>
                    <option value="5">Labor Social</option>
                    <option value="6">Economía, sostenibilidad e innovación</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div wire:loading wire:target="categoria">
            <div class="d-flex align-items-center mb-2">
                <strong role="status">Cargando...</strong>
                <div class="spinner-border ms-auto" aria-hidden="true"></div>
            </div>
        </div>
        @if (isset($cultores))

            {{-- @if ($categoria == 3)
                <p class="fs-6 fw-bold">Pasan directamente a las elecciones generales de Cultores del Trabajo 2024 por tener 3
                    candidatas.</p>
            @endif --}}

            @foreach ($cultores as $cultor)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="{{ asset($cultor->foto) }}" class="" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cultor->nombre }}</h5>
                            <p class="card-text">{{ $cultor->descripcion }}</p>
                            @if (!$voto)
                                <div class="d-flex justify-content-center">
                                    <a role="button" class="btn btn-lg text-white w-25 float-end"
                                        style="background-color: var(--bs-purple);"
                                        wire:click="votar({{ $cultor->id }})">Votar</a>
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
    </div>

    <script>
        Livewire.on('notificacion', (data) => {
            Swal.fire({
                icon: data.icon,
                // title: "Oops...",
                html: data.msj,
            });
            console.log(data[0].icon);
        })
    </script>
</div>
