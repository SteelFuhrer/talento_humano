@extends('home')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h2> Bienvenido {{ Auth::user()->empleado?->nombre ?? 'Usuario' }}, registra tu asistencia</h2>

                    <!-- Mostrar la fecha y hora actual en tiempo real -->
                    <p><strong>Hora actual: </strong><span
                            id="current-datetime">{{ \Carbon\Carbon::now()->format('d/m/Y, H:i:s') }}</span></p>
                    <script>
                        function updateDateTime() {
                            const now = new Date();
                            const formattedDateTime = now.toLocaleDateString('es-ES') + ', ' + now.toLocaleTimeString('es-ES');
                            document.getElementById('current-datetime').innerText = formattedDateTime;
                        }
                        setInterval(updateDateTime, 1000);
                    </script>

                    {{-- Mostrar el último registro de asistencia de forma estática --}}
                    <div class="mt-1">
                        <p id="ultimo-registro">
                            @if ($ultimoRegistro)
                                <strong>Tu último registro fue:</strong>
                                {{ $ultimoRegistro->tipoAsistencia->tipoes ?? 'Sin tipo registrado' }}<br>
                                <strong>Fecha y hora:</strong>
                                {{ \Carbon\Carbon::parse($ultimoRegistro->fechahora)->format('d/m/Y H:i:s') }}
                            @else
                                No hay registros de asistencia previos.
                            @endif
                        </p>
                    </div>

                    <form action="{{ route('asistencia.registrar') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="ci" id="ci" class="form-control"
                                value="{{ Auth::user()->empleado?->ci ?? '0' }}" readonly hidden>
                        </div>
                        <p><strong> Registrar mi asistencia:</strong></p>
                        <div class="form-group row align-items-center">
                            <div class="col-md-8">
                                <select name="tipo_asistencia" id="tipo_asistencia" class="form-control" required>
                                    @foreach ($tiposAsistencia as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->tipoes }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Botón de enviar -->
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="submit" class="btn btn-success w-100">Registrar Asistencia</button>
                            </div>
                        </div>
                    </form>
                    @if(session('error'))
                    <div class="alert alert-danger mt-2">
                        {{ session('error') }}
                    </div>
                @endif
                </div>
                

                <div class="card-body">
                    <!-- Formulario de búsqueda -->
                    <form action="{{ route('asistencia.buscar') }}" method="GET" class="mt-3">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <label for="fecha_inicio">Fecha Inicio</label>
                                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
                            </div>
                            <div class="col-md-5">
                                <label for="fecha_fin">Fecha Fin (Opcional)</label>
                                <input type="date" name="fecha_fin" id="fecha_fin" class="form-control">
                            </div>
                            <div class="col-md-2 align-self-end">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    
                    <!-- Tabla de registros de hoy -->
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($asistenciasHoy as $asistencia)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($asistencia->fechahora)->format('Y-m-d') }}</td>
                                    <td>{{ $asistencia->tipoAsistencia->tipoes }}</td>
                                    <td>{{ \Carbon\Carbon::parse($asistencia->fechahora)->format('H:i:s') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No hay registros de asistencia para hoy.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection