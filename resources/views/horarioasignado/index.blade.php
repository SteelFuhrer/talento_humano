@extends('home')

@section('content')
<div class="content" style="margin-left: 20px">
    <h2>Gestión de horarios asignados</h2>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><b>Listado de horarios asignados</b></h3>
            <div class="card-tools">
                <a href="{{ route('horarioasignado.create') }}" class="btn btn-success btn-sm" title="Nuevo Registro">
                    <i class="fa-solid fa-circle-plus"></i> Nuevo
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>CI</th>
                            <th>Nombre del Empleado</th>
                            <th>Horario</th>
                            <th>Fecha de Asignación</th>
                            <th>Causa del Horario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($horarioasignado as $asignado)
                        <tr>
                            <td>{{ $asignado->ci }}</td> 
                            <td>{{ $asignado->empleado->nombre ?? 'N/A' }}</td>
                            <td>{{ $asignado->horario->nombre ?? 'N/A' }}</td>
                            <td>{{ $asignado->FAsignacion }}</td>
                            <td>{{ $asignado->CausaHorario }}</td>
                            <td style="width:140px;">
                                <a href="{{ route('horarioasignado.edit', $asignado->id) }}" class="btn btn-warning" title="Modificar registro">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('horarioasignado.destroy', $asignado->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Está seguro de eliminar este registro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Eliminar registro">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
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
            }, {
                extend: 'colvis',
                text: 'Visor de columnas'
            }],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection

