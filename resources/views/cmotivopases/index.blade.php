@extends('home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Pases</h1>
            <a href="{{ route('cmotivopases.create') }}" class="btn btn-primary mb-4">Crear Nuevo Pase</a>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tipo de Pases</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cmotivopases as $cmotivopase)
                        <tr>
                            <td>{{ $cmotivopase->motivopase }}</td>
                            <td style="width:120px;">
                                <a href="{{ route('cmotivopases.edit', ['cmotivopase' => $cmotivopase->id_motivopase]) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('cmotivopases.destroy', ['cmotivopase' => $cmotivopase->id_motivopase]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
