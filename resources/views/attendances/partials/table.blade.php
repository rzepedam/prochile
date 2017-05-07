<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Asistente</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Hora</th>
            </tr>
        </thead>
        <tbody>
        @foreach($attendances as $attendance)
            <tr>
                <td>{{ $attendance->assistance->full_name }}</td>
                <td class="text-center">{{ $attendance->date }}</td>
                <td class="text-center">{{ $attendance->hour }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>