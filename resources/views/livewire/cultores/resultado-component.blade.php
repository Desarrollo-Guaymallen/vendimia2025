<div>

    <h5>Resultados de las elecciones</h5>
    {{-- <div class="row">
        <div class="col-md-auto">
            <div class="mb-3">
                <label for="" class="form-label">Listado de categorías</label>
                <select class="form-select" name="" id="" wire:model.lazy="categoria"
                    wire:change="updateData">
                    <option value="" selected>Seleccione...</option>
                    <option value="1">artes_gral (visuales, plásticas, literarias, musicales, escénicas, gráficas,
                        textil)</option>
                    <option value="2">Educación</option>
                    <option value="3">Salud</option>
                    <option value="4">Deportes</option>
                    <option value="5">Labor Social</option>
                    <option value="6">Economía, sostenibilidad e innovación</option>
                </select>
            </div>
        </div>
    </div> --}}


    <div class="row mb-2">
        <p class="fs-5">Votantes en total en la categoría <b>Artes</b>: {{ $total_categoria_artes_gral }}</p>
    </div>

    <div class="table-responsive-md">
        <table class="table table-striped" id="example">
            <thead>
                <tr>
                    <th scope="col">Votos</th>
                    <th scope="col">Nombre del cultor</th>
                    <th scope="col">Porcentaje</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($resultados_artes_gral as $item)
                    <tr class="align-items">
                        <td scope="row">{{ $item->count_artes_gral }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ round(($item->count_artes_gral / $total_categoria_artes_gral) * 100, 2) }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <hr>
    <div class="row mb-2">
        <p class="fs-5">Votantes en total en la categoría <b>Educación</b>: {{ $total_categoria_educacion_gral }}</p>
    </div>
    <div class="table-responsive-md">
        <table class="table table-striped" id="example2">
            <thead>
                <tr>
                    <th scope="col">Votos</th>
                    <th scope="col">Nombre del cultor</th>
                    <th scope="col">Porcentaje</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resultados_educacion_gral as $item)
                    <tr class="align-items">
                        <td scope="row">{{ $item->count_educacion_gral }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ round(($item->count_educacion_gral / $total_categoria_educacion_gral) * 100, 2) }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <hr>
    <div class="row mb-2">
        <p class="fs-5">Votantes en total en la categoría <b>Salud</b>: {{ $total_categoria_salud_gral }}</p>
    </div>
    <div class="table-responsive-md">
        <table class="table table-striped" id="example3">
            <thead>
                <tr>
                    <th scope="col">Votos</th>
                    <th scope="col">Nombre del cultor</th>
                    <th scope="col">Porcentaje</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resultados_salud_gral as $item)
                    <tr class="align-items">
                        <td scope="row">{{ $item->count_salud_gral }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ round(($item->count_salud_gral / $total_categoria_salud_gral) * 100, 2) }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <hr>
    <div class="row mb-2">
        <p class="fs-5">Votantes en total en la categoría <b>Deportes</b>: {{ $total_categoria_deportes_gral }}</p>
    </div>
    <div class="table-responsive-md">
        <table class="table table-striped" id="example4">
            <thead>
                <tr>
                    <th scope="col">Votos</th>
                    <th scope="col">Nombre del cultor</th>
                    <th scope="col">Porcentaje</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resultados_deportes_gral as $item)
                    <tr class="align-items">
                        <td scope="row">{{ $item->count_deportes_gral }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ round(($item->count_deportes_gral / $total_categoria_deportes_gral) * 100, 2) }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <hr>
    <div class="row mb-2">
        <p class="fs-5">Votantes en total en la categoría <b>Labor Social</b>: {{ $total_categoria_laborsocial_gral }}</p>
    </div>
    <div class="table-responsive-md">
        <table class="table table-striped" id="example5">
            <thead>
                <tr>
                    <th scope="col">Votos</th>
                    <th scope="col">Nombre del cultor</th>
                    <th scope="col">Porcentaje</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resultados_laborsocial_gral as $item)
                    <tr class="align-items">
                        <td scope="row">{{ $item->count_laborsocial_gral }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ round(($item->count_laborsocial_gral / $total_categoria_laborsocial_gral) * 100, 2) }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <hr>
    <div class="row mb-2">
        <p class="fs-5">Votantes en total en la categoría <b>Economía</b>: {{ $total_categoria_economia_gral }}</p>
    </div>
    <div class="table-responsive-md">
        <table class="table table-striped" id="example6">
            <thead>
                <tr>
                    <th scope="col">Votos</th>
                    <th scope="col">Nombre del cultor</th>
                    <th scope="col">Porcentaje</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($resultados_economia_gral as $item)
                    <tr class="align-items">
                        <td scope="row">{{ $item->count_economia_gral }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ round(($item->count_economia_gral / $total_categoria_economia_gral) * 100, 2) }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <script type="module">
        var table = new DataTable('#example', {
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'Resultados de Cultores - Categoría Artes',
                    message: 'Votantes: ' + {{ $total_categoria_artes_gral }}
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Resultados de Cultores - Categoría Artes',
                    message: 'Votantes: ' + {{ $total_categoria_artes_gral }}
                }
            ],
            order: [
                [0, 'desc']
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
            },
        });
        var table2 = new DataTable('#example2', {
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'Resultados de Cultores - Categoría Educación',
                    message: 'Votantes: ' + {{ $total_categoria_educacion_gral }}
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Resultados de Cultores - Categoría Educación',
                    message: 'Votantes: ' + {{ $total_categoria_educacion_gral }}
                }
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
            },
        });
        var table3 = new DataTable('#example3', {
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'Resultados de Cultores - Categoría Salud',
                    message: 'Votantes: ' + {{ $total_categoria_salud_gral }}
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Resultados de Cultores - Categoría Salud',
                    message: 'Votantes: ' + {{ $total_categoria_salud_gral }}
                }
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
            },
        });
        var table4 = new DataTable('#example4', {
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'Resultados de Cultores - Categoría Deportes',
                    message: 'Votantes: ' + {{ $total_categoria_deportes_gral }}
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Resultados de Cultores - Categoría Deportes',
                    message: 'Votantes: ' + {{ $total_categoria_deportes_gral }}
                }
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
            },
        });
        var table5 = new DataTable('#example5', {
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'Resultados de Cultores - Categoría Labor Social',
                    message: 'Votantes: ' + {{ $total_categoria_laborsocial_gral }},
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Resultados de Cultores - Categoría Labor Social',
                    message: 'Votantes: ' + {{ $total_categoria_laborsocial_gral }}
                }
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
            },
        });
        var table6 = new DataTable('#example6', {
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'Resultados de Cultores - Categoría Economía',
                    message: 'Votantes: ' + {{ $total_categoria_economia_gral }}
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Resultados de Cultores - Categoría Economía',
                    message: 'Votantes: ' + {{ $total_categoria_economia_gral }}
                }
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
            },
        });
        // Livewire.on('evento', () => {
        //     table.destroy();
        //     new DataTable('#example', {
        //         language: {
        //             url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        //         },
        //     });
        // })
    </script>
</div>
