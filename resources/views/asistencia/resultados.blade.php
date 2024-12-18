@extends('home')
@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h2>Resultados de Asistencia</h2>
                <p><strong>Rango: </strong> {{ $fechaInicio }} @if ($fechaInicio != $fechaFin) - {{ $fechaFin }} @endif</p>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Tipo</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($asistencias as $asistencia)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($asistencia->fechahora)->format('Y-m-d') }}</td>
                                <td>{{ $asistencia->tipoAsistencia->tipoes }}</td>
                                <td>{{ \Carbon\Carbon::parse($asistencia->fechahora)->format('H:i:s') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No hay registros de asistencia para este rango de fechas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <script>
                    $(function () {
                        $("#example1").DataTable({
                            "pageLength": 10,
                            "language": {
                                "emptyTable": "No hay información",
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                                "infoEmpty": "Mostrando 0 a 0 de 0 Registros",
                                "infoFiltered": "(Filtrado de _MAX_ total Registros)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "lengthMenu": "Mostrar _MENU_ Registros",
                                "loadingRecords": "Cargando...",
                                "processing": "Procesando...",
                                "search": "Buscador:",
                                "zeroRecords": "Sin resultados encontrados",
                                "paginate": {
                                    "first": "Primero",
                                    "last": "Ultimo",
                                    "next": "Siguiente",
                                    "previous": "Anterior"
                                }
                            },
                            "responsive": true, "lengthChange": true, "autoWidth": false,
                            buttons: [{
                                extend: 'collection',
                                text: 'Reportes',
                                orientation: 'landscape',
                                buttons: [{
                                    text: 'Copiar',
                                    extend: 'copy',
                                }, {
                                    extend: 'pdf'
                                },{
                                    extend: 'csv'
                                },{
                                    extend: 'excel'
                                },{
                                    text: 'Imprimir',
                                    extend: 'print'
                                }
                                ]
                            },
                                {
                                    extend: 'colvis',
                                    text: 'Visor de columnas',
                                    collectionLayout: 'fixed one-column'
                                }
                            ],
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                    });
                </script>
            </div>
            <div class="card-footer">
                <a href="{{ route('asistencia.form') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection
