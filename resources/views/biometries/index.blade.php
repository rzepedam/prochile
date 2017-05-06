@extends('layouts.master')

@section('title') Listado Biometry @stop

@section('title-header') Listado Biometry @stop

@section('breadcrumb')
    <li class="active"><strong>Biometry</strong></li>
@stop

@section('content')

    <div class="row animated fadeInRight">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">

                    @include('biometries.partials.table')

                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script src="{{ mix('/js/index.js') }}"></script>
@stop
