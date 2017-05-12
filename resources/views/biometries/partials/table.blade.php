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
            <?php $i = 0; ?>
            @foreach($biometries as $biometry)
                @if ($biometry->is_active === 'True')
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $biometry->first_name . ' ' . $biometry->last_name }}</td>
                        <td class="text-center">{{ \ProChile\Http\Helpers\Helper::rut($biometry->rut) }}</td>
                    </tr>
                    <?php $i ++; ?>
                @endif
            @endforeach
        </tbody>
    </table>
</div>