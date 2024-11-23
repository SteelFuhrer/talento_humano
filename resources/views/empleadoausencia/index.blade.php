@extends('home')

@section('content')
<div class="content" style="margin-left: 20px">
    <h2>Gestión de Ausencias de Empleados</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Listado de Ausencias de Empleados</b></h3>
                    <div class="card-tools">
                        <a href="{{ route('empleadoausencia.create') }}" class="btn btn-success btn-sm" title="Nuevo Registro"><i class="fa-solid fa-circle-plus"></i> Nuevo</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('empleadoausencia.approve') }}" method="POST" id="approveForm">
                        @csrf
                        @method('PUT')
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>CI</th>
                                        <th>IdAusencia</th>
                                        <th>Fecha de Inicio</th>
                                        <th>Fecha de Fin</th>
                                        <th>CJefe</th>
                                        <th>Estado</th> <!-- Nuevo campo para el estado -->
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count=1; ?>
                                    @foreach($empleadoAusencias as $empleadoAusencia)
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <!-- Mostrar nombre del empleado -->
                                        <td>{{ $empleadoAusencia->empleado->nombre }}</td>
                                        <!-- Mostrar tipo de ausencia -->
                                        <td>{{ $empleadoAusencia->ausencia->tipoausencia }}</td>
                                        <td>{{ $empleadoAusencia->FInicio }}</td>
                                        <td>{{ $empleadoAusencia->FFin }}</td>
                                        <td>{{ $empleadoAusencia->CJefe }}</td>
                                        <td>
                                            <!-- Mostrar "Aprobado" o "No Aprobado" según el estado -->
                                            {{ $empleadoAusencia->estado ? 'Aprobado' : 'No Aprobado' }}
                                        </td>
                                        <td style="width:120px;">
                                            <a href="{{ route('empleadoausencia.edit', ['IdEmpleadoAusencia' => $empleadoAusencia->IdEmpleadoAusencia]) }}" class="btn btn-warning" title="Modificar registro"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <form action="{{ route('empleadoausencia.destroy', ['empleadoAusencia' => $empleadoAusencia->IdEmpleadoAusencia]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Está seguro de eliminar este registro?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" title="Eliminar registro"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php $count++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
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
@endsection