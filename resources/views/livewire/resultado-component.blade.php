<div>
    @php
        $var = 0;
    @endphp

    <p class="fs-5">Resultados de las elecciones</p>
    {{-- <p class="fs-5 fw-bold">{{ $sql }}</p> --}}
    <div class="table-responsive-md">
        <table class="table table-hover table-striped" id="resultados">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Distrito</th>
                    <th scope="col">Votos Comisión</th>
                    <th scope="col">Votos Publico</th>
                    <th scope="col">Porcentaje Público</th>
                    <th scope="col">Proporción Público (60%)</th>
                    <th scope="col">Proporción Comisión (40%)</th>
                    <th scope="col">Resultado Final</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($votos as $item)
                    <tr class="align-middle">
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->distritos->nombre }}</td>
                        {{-- <td>{{ $item->voto_candidata }}</td> --}}
                        <td>{{ $item->voto_comision }}</td>
                        <td>{{ $item->voto_candidata - $item->voto_comision }}</td>
                        @if ($total_votos == 0 || $total_comision == 0)
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        @else
                            <!-- Porcentaje Público -->
                            <td>{{ round( * 100 / 2, 2) }}%
                            </td>

                            <!-- Proporción Público (60%) -->
                            <td>{{ round(($item->voto_candidata - $item->voto_comision / ($total_votos - $total_comision)) * 60, 2) }}
                            </td>

                            @php
                                $total_publico_prop = round(
                                    ($item->voto_candidata - $item->voto_comision / ($total_votos - $total_comision)) *
                                        60,
                                    2,
                                );
                            @endphp


                            <!-- Proporción Comisión (40%) -->
                            <td>{{ round(($item->voto_comision / $total_comision) * 40, 2) }}%</td>

                            @php
                                $total_comision_prop = round(($item->voto_comision / $total_comision) * 40, 2)
                            @endphp


                            <!-- Resultado Final -->
                            <td>
                                {{-- {{ round(
                                    (($item->voto_candidata - $item->voto_comision / $total_votos) * 0.6 +
                                        ($item->voto_comision / $total_comision) * 0.4) *
                                        100,
                                    2,
                                ) }}% --}}
                                 {{ $total_publico_prop + $total_comision_prop }}
                                {{-- @php
                                    $var +=
                                        (($item->voto_candidata / $total_votos) * 0.6 +
                                            ($item->voto_comision / $total_comision) * 0.4) *
                                        100;
                                @endphp --}}
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th></th>
                    <th>{{ $total_comision }}</th>
                    <th>{{ $total_votos - $total_comision }}</th>
                    <th>100%</th>
                    <th>60%</th> <!-- Total Público 60% -->
                    <th>{{ $total_comision }}</th> <!-- Total Comisión 40% -->
                    <th>{{ round($var, 2) }}%</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <script>
        new DataTable('#resultados', {
            "pageLength": 50,
            "columnDefs": [{
                "type": "num-fmt",
                targets: [3, 4, 5, 6]
            }],
            // "columnDefs": [{
            //     "type": "num-fmt",
            //     targets: 6
            // }],
            order: [
                [6, 'desc']
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
            },
        });
    </script>
</div>
