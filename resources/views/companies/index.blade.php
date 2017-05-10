@extends('layouts.master')

@section('title') Listado Empresas @stop

@section('title-header') Listado Empresas @stop

@section('breadcrumb')
    <li class="active"><strong>Empresas</strong></li>
@stop

@section('content')

    <div class="row animated fadeInRight">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="{{ route('companies.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus-circle"></i> Crear Nueva Empresa
                    </a>
                </div>
                <div class="ibox-content">

                    @include('companies.partials.table')

                </div>
            </div>
        </div>
    </div>

    {{-- $companies->links() --}}

@stop

@section('scripts')
    <script src="{{ mix('/js/index.js') }}"></script>
@stop
