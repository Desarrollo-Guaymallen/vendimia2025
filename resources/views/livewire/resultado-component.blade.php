<div>

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
                @php
                    $porc_publico = 0;
                    $prop_publico = 0;
                    $prop_comision = 0;
                    $resultado = 0;
                @endphp
                @foreach ($votos as $item)
                    <tr class="align-middle">
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->distritos->nombre }}</td>
                        <td>{{ $item->voto_comision }}</td>
                        <td>{{ $item->voto_vecino }}</td>
                        @if ($total_votos == 0 || $total_comision == 0)
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        @else
                            <!-- Porcentaje Público -->
                            <td>{{ round(($item->voto_vecino * 100) / $total_publico, 2) }}%
                            </td>

                            <!-- Proporción Público (60%) -->
                            <td>{{ round(($item->voto_vecino * 60) / $total_publico, 2) }}%
                            </td>

                            <!-- Proporción Comisión (40%) -->
                            <td>{{ round(($item->voto_comision * 40) / $total_comision, 2) }}%</td>

                            <!-- Resultado Final -->
                            <td>
                                {{ round(($item->voto_vecino * 60) / $total_publico + ($item->voto_comision * 40) / $total_comision, 2) }}%
                            </td>
                        @endif
                    </tr>
                    @php
                        $porc_publico += round(($item->voto_vecino * 100) / $total_publico, 2);
                        $prop_publico += round(($item->voto_vecino * 60) / $total_publico, 2);
                        $prop_comision += round(($item->voto_comision * 40) / $total_comision, 2);
                        $resultado += round(
                            ($item->voto_vecino * 60) / $total_publico + ($item->voto_comision * 40) / $total_comision,
                            2,
                        );
                    @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th></th>
                    <th>{{ $total_comision }}</th>
                    <th>{{ $total_publico }}</th>
                    <th>{{ $porc_publico }}%</th>
                    <th>{{ $prop_publico }}%</th> <!-- Total Público 60% -->
                    <th>{{ $prop_comision }}%</th> <!-- Total Comisión 40% -->
                    <th>{{ $resultado }}%</th>
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
            dom: 'Bfrtip',
            buttons: [{
                extend: 'pdfHtml5',
                download: 'open',
                // footer: true,
                title: 'Resultados - Representante Distrital de Guaymallén 2025',
            }],
            order: [
                [7, 'desc']
            ],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
            },
        });
    </script>
</div>
