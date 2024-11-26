@extends('home')
@section('content')
    <div class="container">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3>Registros de Asistencia - Desde {{ $fechaInicio }} hasta {{ $fechaFin }}</h3>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Departamento</th>
                            <th>Tipo de Asistencia</th>
                            <th>Hora</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($datos as $dato)
                            <tr>
                                <td>{{ $dato['nombre'] }}</td>
                                <td>{{ $dato['apellido'] }}</td>
                                <td>{{ $dato['departamento'] }}</td>
                                <td>{{ $dato['tipo_asistencia'] }}</td>
                                <td>{{ $dato['hora'] }}</td>
                                <td>{{ $dato['fecha'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No se encontraron registros en el rango seleccionado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- Page specific script -->
                <script>
                    $(function() {
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
                            "responsive": true,
                            "lengthChange": true,
                            "autoWidth": false,
                            buttons: [{
                                    extend: 'collection',
                                    text: 'Reportes',
                                    orientation: 'landscape',
                                    buttons: [{
                                        text: 'Copiar',
                                        extend: 'copy',
                                    }, {
                                        extend: 'pdf'
                                    }, {
                                        extend: 'csv'
                                    }, {
                                        extend: 'excel'
                                    }, {
                                        text: 'Imprimir',
                                        extend: 'print'
                                    }]
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
                <a href="{{ route('asistencias.hoy') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
@endsection
