@extends('home')

@section('content')

<style>
    #example1 {
        font-size: 14px; 
    }
</style>

<div class="content" style="margin-left: 20px">
    <h2>Solicitudes de Ausencia</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Listado de Solicitudes de Ausencia</b></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Departamento</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Motivo</th>
                                    <th>Jefe Inmediato</th>
                                    <th>Autorizado Por</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($empleadoAusencias as $index => $empleadoAusencia)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $empleadoAusencia->nombres }}</td>
                                    <td>{{ $empleadoAusencia->nombredpto }}</td>
                                    <td>{{ $empleadoAusencia->FInicio }}</td>
                                    <td>{{ $empleadoAusencia->FFin }}</td>
                                    <td>{{ $empleadoAusencia->tipoausencia }}</td>
                                    <td>{{ $empleadoAusencia->jefe }}</td>
                                    <td>{{ $empleadoAusencia->autoriza }}</td>
                                    <td>
                                        @if($empleadoAusencia->estado == 0)
                                            <span class="badge badge-warning">Pendiente</span>
                                        @elseif($empleadoAusencia->estado == 1)
                                            <span class="badge badge-success">Aprobado</span>
                                        @else
                                            <span class="badge badge-danger">No Aprobado</span>
                                        @endif
                                    </td>
                                    <td style="width:110px;">
                                        <a href="{{ route('adminausencia.edit', ['IdEmpleadoAusencia' => $empleadoAusencia->IdEmpleadoAusencia, 'estado' => 1]) }}" class="btn btn-success btn-sm" title="Aprobar solicitud">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </a>
                                        <a href="{{ route('adminausencia.edit', ['IdEmpleadoAusencia' => $empleadoAusencia->IdEmpleadoAusencia, 'estado' => 0]) }}" class="btn btn-warning btn-sm" title="Cambiar a pendiente">
                                            <i class="fa-solid fa-circle-pause"></i>
                                        </a>
                                        <a href="{{ route('adminausencia.edit', ['IdEmpleadoAusencia' => $empleadoAusencia->IdEmpleadoAusencia, 'estado' => 2]) }}" class="btn btn-danger btn-sm" title="Rechazar solicitud">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
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
        </div>
    </div>
</div>
@endsection
