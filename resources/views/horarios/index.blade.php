@extends('home')
@section('content')
<div class="content" style="margin-left: 20px">
    <h2>Gestión de horarios</h2>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><b>Listado de horarios</b></h3>
            <div class="card-tools">
            <a href="{{ route('horarios.create') }}" class="btn btn-success btn-sm" title="Nuevo Registro"><i class="fa-solid fa-circle-plus"></i> Nuevo</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Hora de Entrada</th>
                            <th>Hora de Salida</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($horarios as $horario)
                        <tr>
                            <td>{{ $horario->nombre }}</td>
                            <td>{{ date('g:i A', strtotime($horario->hora_entrada)) }}</td>
                            <td>{{ date('g:i A', strtotime($horario->hora_salida)) }}</td>
                            <td style="width:90px;">
                                <a href="{{ route('horarios.edit', $horario->id) }}" class="btn btn-warning" title="Modificar registro"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Está seguro de eliminar este registro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Eliminar registro"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

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
@endsection
