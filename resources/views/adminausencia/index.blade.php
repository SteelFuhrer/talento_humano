@extends('home')

@section('content')
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
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Ausencia</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($empleadoAusencias as $index => $empleadoAusencia)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $empleadoAusencia->FInicio }}</td>
                                    <td>{{ $empleadoAusencia->FFin }}</td>
                                    <td>{{ $empleadoAusencia->ausencia->tipoausencia }}</td>
                                    <td>
                                        <form action="{{ route('adminausencia.update', $empleadoAusencia->IdEmpleadoAusencia) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="estado" value="0">
                                            <input type="checkbox" name="estado" value="1" onchange="this.form.submit()" {{ $empleadoAusencia->estado == 1 ? 'checked' : '' }}>
                                        </form>
                                    </td>
                                    <td style="width:140px;">
                                        <a href="{{ route('adminausencia.show', $empleadoAusencia->IdEmpleadoAusencia) }}" class="btn btn-info" title="Ver registro"><i class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('adminausencia.edit', $empleadoAusencia->IdEmpleadoAusencia) }}" class="btn btn-warning" title="Modificar registro"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('adminausencia.destroy', $empleadoAusencia->IdEmpleadoAusencia) }}" method="POST" style="display:inline;" onsubmit="return confirm('Está seguro de eliminar esta solicitud?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="Eliminar registro"><i class="fa-solid fa-trash"></i></button>
                                        </form>
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
