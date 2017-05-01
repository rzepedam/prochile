<table class="table">
    <thead>
        <tr>
            <th>Asistente</th>
            <th class="text-center">Rut</th>
            <th class="text-center">Email</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($assistances as $assistance)
        <tr>
            <td>{{ $assistance->male_surname . ' ' . $assistance->first_name }}</td>
            <td class="text-center">{{ $assistance->rut }}</td>
            <td class="text-center">{{ $assistance->email }}</td>
            <td class="text-center">
                    <a href="#" class="showModal waves" data-toggle="modal" data-target="#showModal" data-object="{{ $assistance }}">
                        <i class="fa fa-search text-info"></i>
                    </a>&nbsp;
                    <a href="{{ route('assistances.edit', $assistance->id) }}" class="waves">
                        <i class="fa fa-pencil text-warning"></i>
                    </a>&nbsp;
                    <a href="javascript:void(0)" data-id="{{ $assistance->id }}" class="btn-delete waves" data-url="{{ Request::path() }}" data-token="{{ csrf_token() }}">
                        <i class="fa fa-trash text-danger"></i>
                    </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@include('layouts.modals.showAssistance')