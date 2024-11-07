@extends('home')

@section('content')
<div class="container">
    <div class="card" style="margin: 10px; max-width: 1200px; margin: auto;">
        <h2 class="card-header">Configuración de usuario</h2>
        <div class="card-body">
            <form method="POST" id="changepasswd" action="{{ route('update_user', $user->id) }}">
                @csrf
                @method('PUT')
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div id="error-message" class="alert alert-danger" style="display: none;">
                    <!-- El mensaje de error será insertado aquí -->
                </div>
                <div hidden>
                    <select name="ci" id="ci" class="custom-select" required>
                        <option value="" disabled {{ old('sexo') ? '' : 'selected' }}>Seleccione un empleado</option>
                        @foreach ($empleados as $empleado)
                        <option value="{{ $empleado->ci }}" {{ old('ci', $user->ci) == $empleado->ci ? 'selected' : '' }}>
                                {{ $empleado->ci }} - {{ $empleado->nombre }} {{ $empleado->apellido }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Correo electrónico:</label>
                    <input type="text" id="email" name="email" class="form-control" value="{{ old('email', $user->email)}}" required>
                </div>
                <div class="form-group">
                    <label for="content">Contraseña actual:</label>
                    <input type="password" id="password_actual" name="password_actual" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="content">Nueva Contraseña:</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">Confirmar la Nueva Contraseña:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary"><i class="fa-solid fa-circle-check"></i> Actualizar</button>
            </form>
            <script>
                const errorMessageDiv = document.getElementById('error-message');
                $("#changepasswd").submit(function(e){
                        if($("#password").val() == $("#password_confirmation").val()){
                        }else{
                            e.preventDefault();
                            errorMessageDiv.style.display = 'block';  // Mostrar el div
                            errorMessageDiv.innerHTML = 'Las contraseñas no coinciden, por favor verifica los campos.';  // Colocar el mensaje
                        }
                    });
            </script>
        </div>
    </div>
</div>
@endsection  