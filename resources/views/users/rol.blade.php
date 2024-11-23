@extends('home')
@section('content')
<div class="content" style="margin-left: 20px">
    <h2>Asignar un rol</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title"><b>Usuario:</b></h3>
                    <br>
                    <p class="form-control">{{$user->nombre}}</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.rol_update', ['user' => $user->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <div class="form-check">
                            @foreach ($roles as $rol)
                                <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $rol->id }}" id="role_{{ $rol->id }}"
                                    @if($userRoles->contains($rol->id)) checked @endif >
                                <label class="form-check-label" for="role_{{ $rol->id }}">
                                    {{ $rol->name }}
                                </label>
                                <br>
                            @endforeach
                        </div>
                        <br>
                        <div class="card-footer">  
                        <button type="submit" class="btn btn-primary" title="Guardar cambios">
                            <i class="fa-solid fa-floppy-disk"></i> Guardar
                        </button>
                        <button type="button" id="regresar" class="btn btn-secondary" onclick="window.location.href='{{ route('users.index') }}'">
                            <i class="fa-solid fa-circle-left"></i> Regresar
                        </button>
                    </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
