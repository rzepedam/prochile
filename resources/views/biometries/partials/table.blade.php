<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Rut</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($biometries as $biometry)
                <tr>
                    <td>{{ $biometry->first_name . ' ' . $biometry->last_name }}</td>
                    <td></td>
                    <td class="text-center">
                        <a href="">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>