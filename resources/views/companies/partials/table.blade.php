<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Empresa</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $company->name }}</td>
                <td class="text-center">
                    <a href="javascript:void(0)" data-id="{{ $company->id }}" class="btn-delete waves" data-url="{{ Request::path() }}" data-token="{{ csrf_token() }}">
                        <i class="fa fa-trash text-danger"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>