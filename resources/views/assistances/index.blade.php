@extends('layouts.master')

@section('title') Listado Asistentes @stop

@section('title-header') Listado Asistentes @stop

@section('breadcrumb')
    <li class="active"><strong>Asistentes</strong></li>
@stop

@section('content')

    <div class="row animated fadeInRight">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="{{ route('assistances.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus-circle"></i> Crear Nuevo Asistente
                    </a>
                </div>
                <div class="ibox-content">

                    @include('assistances.partials.table')

                </div>
            </div>
        </div>
    </div>

    {{ $assistances->links() }}

@stop

@section('scripts')
    <script src="{{ mix('/js/index.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('.showModal').on('click', function() {
                var object = JSON.parse($(this).attr('data-object'));

                $('#modalImage').attr('src', object['photo']);
                $('#modalName').text(object['first_name'] + ' ' + object['male_surname'] + ' ' + object['female_surname']);
                $('#modalEmail').text(object['email']);
                $('#modalTypeAssistance').text(object['type_assistance']['name']);
                $('#modalCity').text(object['city']['name']);
                $('#modalCompany').text(object['company']['name']);
                $('#modalIndustry').text(object['industry']['name']);
                $('#modalRut').text(object['rut']);
                $('#modalCountry').text(object['country']['name']);
                $('#modalPhone').text(object['phone']);
            });
        });
    </script>
@stop