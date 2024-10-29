@extends('home')
@section('content')
<div class="container">
    <div class="row" style="margin:20px">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Gestión de empleados</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('empleados.create') }}" class="btn btn-success btn-sm" title="Add New"><i class="fa-solid fa-circle-plus"></i> Nuevo</a>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Correo Electrónico</th>
                                    <th>Departamento</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $count=1; ?>
                            @foreach ($empleados as $empleado)
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td>{{ $empleado->nombre.' '.$empleado->apellido }}</td>
                                    <td >{{ $empleado->correoelectronico }}</td>
                                    <td >{{ $empleado->iddpto }}</td>
                                    <td style="width:180px;">
                                        <a href="{{ route('empleados.show', ['empleado' => $empleado->ci]) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('empleados.edit', ['empleado' => $empleado->ci]) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('empleados.destroy', ['empleado' => $empleado->ci]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Estás seguro de eliminar este registro de empleado?');">
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
@endsection
