@extends('home')

@section('content')
<div class="content" style="margin-left: 20px">
    <h2>Retrasos Reportados</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Listado de Retrasos</b></h3>
                    <div class="card-tools">
                        <a href="{{ route('retraso.create') }}" class="btn btn-success btn-sm" title="Nuevo Retraso">
                            <i class="fa-solid fa-circle-plus"></i> Nuevo
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre del Empleado</th>
                                    <th>Tipo de Retraso</th>
                                    <th>Fecha</th>
                                    <th>Minutos</th>
                                    <th>Observación</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                @foreach($retrasos as $retraso)
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $retraso->empleado->nombre }} {{ $retraso->empleado->apellido }}</td>
                                    <td>{{ $retraso->tipoRetraso->tipoderetraso }}</td>
                                    <td>{{ $retraso->fecha }}</td>
                                    <td>{{ $retraso->minutos }}</td>
                                    <td>{{ $retraso->observacion }}</td>
                                    <td>
                                        @if($retraso->estado == 0)
                                            <span class="badge bg-warning">Pendiente</span>
                                        @elseif($retraso->estado == 1)
                                            <span class="badge bg-success">Aprobado</span>
                                        @elseif($retraso->estado == 2)
                                            <span class="badge bg-danger">Rechazado</span>
                                        @endif
                                    </td>
                                    <td style="width:110px;">
                                        <a href="{{ route('retraso.edit', $retraso->id) }}" class="btn btn-warning btn-sm" title="Editar">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('retraso.destroy', $retraso->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
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
                                        "lengthMenu": "Mostrar _MENU_ Registros",
                                        "loadingRecords": "Cargando...",
                                        "processing": "Procesando...",
                                        "search": "Buscador:",
                                        "zeroRecords": "Sin resultados encontrados",
                                        "paginate": {
                                            "first": "Primero",
                                            "last": "Último",
                                            "next": "Siguiente",
                                            "previous": "Anterior"
                                        }
                                    },
                                    "responsive": true, "lengthChange": true, "autoWidth": false,
                                    buttons: [{
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
                                    {
                                        extend: 'colvis',
                                        text: 'Visor de columnas',
                                        collectionLayout: 'fixed one-column'
                                    }],
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
