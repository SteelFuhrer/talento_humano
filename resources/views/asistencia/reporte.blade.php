@extends('home')
@section('content')
<div class="container">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h2>Registros de Asistencia - {{ now()->format('d/m/Y') }}</h2>

            <form action="{{ route('asistencia.buscarAsist') }}" method="GET" class="mt-3">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <label for="fecha_inicio">Fecha Inicio:</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
                    </div>
                    <div class="col-md-5">
                        <label for="fecha_fin">Fecha Fin:</label>
                        <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required>
                    </div>
                    <div class="col-md-2 align-self-end">
                    <button type="submit" class="btn btn-primary mt-4"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                    </div>
                </div>
            </form>    

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
                            <td colspan="6" class="text-center">No hay registros de asistencia para hoy.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
             <!-- Page specific script -->
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
    </div>
</div>
@endsection
