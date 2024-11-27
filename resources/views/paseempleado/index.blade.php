@extends('home')

@section('content')
<div class="content" style="margin-left: 20px">
    <h2>Gestión de Pases de Empleados</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Listado de Pases de Empleados</b></h3>
                    <div class="card-tools">
                        <a href="{{ route('paseempleado.create') }}" class="btn btn-success btn-sm" title="Nuevo Pase"><i class="fa-solid fa-circle-plus"></i> Nuevo Pase</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Empleado</th>
                                    <th>Fecha</th>
                                    <th>Hora de Salida</th>
                                    <th>Hora de Entrada</th>
                                    <th>Motivo Pase</th>
                                    <th>Jefe que Autoriza</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                @foreach ($pases as $pase)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $pase->empleado->nombre ?? 'Sin asignar' }} {{ $pase->empleado->apellido ?? '' }}</td>
                                        <td>{{ $pase->fecha }}</td>
                                        <td>{{ $pase->hsalida }}</td>
                                        <td>{{ $pase->hentrada }}</td>
                                        <td>{{ $pase->motivoPase->motivopase ?? 'Sin motivo' }}</td>
                                        <td>{{ $pase->jefe->nombre ?? 'Sin jefe' }} {{ $pase->jefe->apellido ?? '' }}</td>
                                        <td>
                                            @if($pase->estado == 0)
                                                <span class="badge bg-warning">Pendiente</span>
                                            @elseif($pase->estado == 1)
                                                <span class="badge bg-success">Aprobado</span>
                                            @elseif($pase->estado == 2)
                                                <span class="badge bg-danger">No Aprobado</span>
                                            @endif
                                        </td>
                                        <td style="width:90px;">
                                            <a href="{{ route('paseempleado.edit', $pase->idpaseempleado) }}" class="btn btn-warning btn-sm" title="Editar Pase"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <form action="{{ route('paseempleado.destroy', $pase->idpaseempleado) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Está seguro de eliminar este pase?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar Pase"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php $count++; ?>
                                @endforeach
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
                                        "search": "Buscador:",
                                        "zeroRecords": "Sin resultados encontrados",
                                        "paginate": {
                                            "first": "Primero",
                                            "last": "Último",
                                            "next": "Siguiente",
                                            "previous": "Anterior"
                                        }
                                    },
                                    "responsive": true, 
                                    "lengthChange": true, 
                                    "autoWidth": false,
                                    buttons: [
                                        {
                                            extend: 'collection',
                                            text: 'Reportes',
                                            buttons: [
                                                { extend: 'copy', text: 'Copiar' },
                                                { extend: 'pdf', text: 'PDF' },
                                                { extend: 'csv', text: 'CSV' },
                                                { extend: 'excel', text: 'Excel' },
                                                { extend: 'print', text: 'Imprimir' }
                                            ]
                                        },
                                        { extend: 'colvis', text: 'Visor de columnas' }
                                    ]
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
