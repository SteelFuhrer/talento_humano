@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">

                <div class="card-header text-center bg-primary text-white">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="max-width: 100px;" class="mb-3">
                    <h4>{{ __('Registro de Usuario') }}</h4>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Selección de Empleado -->
                        <div class="form-group mb-4">
                            <label for="ci" class="form-label">{{ __('Empleado') }}</label>
                            <select name="ci" id="ci" class="form-control @error('ci') is-invalid @enderror" required>
                                <option value="">Seleccione un empleado</option>
                                @foreach ($empleados as $empleado)
                                    <option value="{{ $empleado->ci }}" {{ old('ci') == $empleado->ci ? 'selected' : '' }}>
                                        {{ $empleado->ci }} - {{ $empleado->nombre }} {{ $empleado->apellido }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ci')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="form-group mb-4">
                            <label for="email" class="form-label">{{ __('Correo electrónico') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="example@example.com">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Contraseña -->
                        <div class="form-group mb-4">
                            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="******">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="form-group mb-4">
                            <label for="password-confirm" class="form-label">{{ __('Confirme Contraseña') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="******">
                        </div>

                        <!-- Botón de Registro -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Registrar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
