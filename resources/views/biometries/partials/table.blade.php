<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th class="text-center">Rut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($biometries as $biometry)
                @if ($biometry->is_active === 'True')
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $biometry->first_name . ' ' . $biometry->last_name }}</td>
                        <td class="text-center">{{ \ProChile\Http\Helpers\Helper::rut($biometry->rut) }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>