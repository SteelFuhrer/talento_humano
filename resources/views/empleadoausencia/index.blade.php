@extends('home')

@section('content')
<div class="content" style="margin-left: 20px">
    <h2>Solicitudes de Ausencia</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Listado de solicitudes</b></h3>
                    <div class="card-tools">
                        <a href="{{ route('empleadoausencia.create') }}" class="btn btn-success btn-sm" title="Nueva Solicitud"><i class="fa-solid fa-circle-plus"></i> Nueva</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre del Empleado</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Ausencia</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count=1; ?>
                                @foreach($empleadoAusencias as $empleadoAusencia)
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td>{{ $empleadoAusencia->empleado->nombre }} {{ $empleadoAusencia->empleado->apellido }} </td>
                                    <td>{{ $empleadoAusencia->FInicio}}</td>
                                    <td>{{ $empleadoAusencia->FFin }}</td>
                                    <td>{{ $empleadoAusencia->ausencia->tipoausencia }}</td>
                                    <td>
                                        @if($empleadoAusencia->estado == 0)
                                            <span class="badge bg-warning">Pendiente</span>
                                        @elseif($empleadoAusencia->estado == 1)
                                            <span class="badge bg-success">Aprobado</span>
                                        @elseif($empleadoAusencia->estado == 2)
                                            <span class="badge bg-danger">No Aprobado</span>
                                        @endif
                                    </td>
                               </tr>
                                <?php $count++; ?>
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
