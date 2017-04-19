{{ Form::model($client, ['route' => ['clients.update', $client]]) }}

    @include('clients.sections.fields')

{{ Form::close() }}