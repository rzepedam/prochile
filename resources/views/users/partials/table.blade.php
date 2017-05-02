<table class="table">
    <thead>
        <tr>
            <th>Usuario</th>
            <th class="text-center">Rol</th>
            <th class="text-center">Email</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td class="text-center">{{ $user->role->name }}</td>
            <td class="text-center">{{ $user->email }}</td>
            <td class="text-center">
                <a href="javascript:void(0)" data-id="{{ $user->id }}" class="btn-delete waves" data-url="{{ Request::path() }}" data-token="{{ csrf_token() }}">
                    <i class="fa fa-trash text-danger"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>