@extends('home')
@section('content')
<div class="container">
    <div class="row" style="margin:20px">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Gestión de departamentos</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('departamento.create') }}" class="btn btn-success btn-sm" title="Add New"><i class="fa-solid fa-circle-plus"></i> Nuevo</a>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre del Departamento</th>
                                    <th>Correo Electrónico</th>
                                    <th>Teléfono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $count=1; ?>
                            @foreach ($departamentos as $departamento)
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td>{{ $departamento->nombredpto }}</td>
                                    <td>{{ $departamento->correoelectronicodpto }}</td>
                                    <td>{{ $departamento->telefonodpto }}</td>
                                    <td style="width:180px;">
                                        <a href="{{ route('departamento.show', ['departamento' => $departamento->iddpto]) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('departamento.edit', ['departamento' => $departamento->iddpto]) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('departamento.destroy', ['departamento' => $departamento->iddpto]) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar este departamento?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $count++; ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#departamento').DataTable({
            "lengthMenu": [[5, 10, 15, 20, 25, -1], [5, 10, 15, 20, 25, "All"]]
        });
    } );
    </script>
@endsection
