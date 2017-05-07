@extends('layouts.master')

@section('title') Registro Asistencia @stop

@section('title-header') Registro Asistencia @stop

@section('breadcrumb')
    <li class="active"><strong>Registro Asistencia</strong></li>
@stop

@section('content')

    @include('layouts.messages.error')

    <div class="row animated fadeInRight">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">

                    @include('attendances.partials.table')

                </div>
            </div>
        </div>
    </div>

    {{ $attendances->links() }}

@stop

@section('scripts')
    <script src="{{ mix('/js/index.js') }}"></script>
@stop