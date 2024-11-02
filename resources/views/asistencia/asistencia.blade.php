@extends('home')
@section('content')
    <div class="container">
        <h1>Bienvenido, registra tu asistencia</h1>
        <!-- Mostrar la fecha y hora actual en tiempo real -->
        <p id="current-datetime">{{ \Carbon\Carbon::now()->format('d/m/Y, H:i:s') }}</p>
        <script>
            function updateDateTime() {
                const now = new Date();
                const formattedDateTime = now.toLocaleDateString('es-ES') + ', ' + now.toLocaleTimeString('es-ES');
                document.getElementById('current-datetime').innerText = formattedDateTime;
            }
            setInterval(updateDateTime, 1000);
        </script>

        {{-- Mostrar el último registro de asistencia de forma estática --}}
        <div class="mt-3">
            <h4>Último registro de asistencia</h4>
            <p id="ultimo-registro">
                @if (session('ultimoRegistro'))
                    <strong>Tipo:</strong> {{ session('ultimoRegistro')->idtipoes == 1 ? 'Entrada' : 'Salida' }}<br>
                    <strong>Fecha y hora:</strong> {{ \Carbon\Carbon::parse(session('ultimoRegistro')->fechahora)->format('d/m/Y H:i:s') }}
                @else
                    No hay registros de asistencia previos.
                @endif
            </p>
        </div>

        {{-- Mensaje de éxito después de registrar la asistencia --}}
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form id="asistencia-form" action="{{ route('asistencia.registrar') }}" method="POST" class="mt-4" onsubmit="saveAttendance(event)">
            @csrf
            <div class="form-group">
                <label for="ci">CI del empleado</label>
                <input type="text" name="ci" id="ci" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tipo_asistencia">Tipo de Asistencia</label>
                <select name="tipo_asistencia" id="tipo_asistencia" class="form-control" required>
                    @foreach($tiposAsistencia as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->tipoes }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-2">Registrar Asistencia</button>
        </form>
    </div>

    <script>
        function saveAttendance(event) {
            event.preventDefault();
            const ci = document.getElementById('ci').value;
            const tipoAsistencia = document.getElementById('tipo_asistencia').value;
            const tipoAsistenciaText = document.getElementById('tipo_asistencia').options[document.getElementById('tipo_asistencia').selectedIndex].text;
            const now = new Date();
            const formattedDateTime = now.toLocaleDateString('es-ES') + ', ' + now.toLocaleTimeString('es-ES');

            const attendanceRecord = {
                ci: ci,
                tipoAsistencia: tipoAsistencia,
                tipoAsistenciaText: tipoAsistenciaText,
                dateTime: formattedDateTime
            };

            localStorage.setItem('ultimoRegistro', JSON.stringify(attendanceRecord));
            displayAttendanceRecord(attendanceRecord);

            // Submit the form
            document.getElementById('asistencia-form').submit();
        }

        function displayAttendanceRecord(record) {
            const ultimoRegistroElement = document.getElementById('ultimo-registro');
            ultimoRegistroElement.innerHTML = `
                <strong>Tipo:</strong> ${record.tipoAsistenciaText}<br>
                <strong>Fecha y hora:</strong> ${record.dateTime}
            `;
        }

        document.addEventListener('DOMContentLoaded', () => {
            const savedRecord = localStorage.getItem('ultimoRegistro');
            if (savedRecord) {
                displayAttendanceRecord(JSON.parse(savedRecord));
            }
        });
    </script>
@endsection



