@extends('layouts.master')

@section('title') Crear Usuario @stop

@section('title-header') Crear Usuario @stop

@section('breadcrumb')
    <li><a href="{{ route('users.index') }}">Usuarios</a></li>
    <li class="active"><strong>Nuevo</strong></li>
@stop

@section('content')

    @include('layouts.messages.error')

    <div class="section animated fadeInRight">
        {{ Form::open(['route' => 'users.store', 'method' => 'POST', 'id' => 'form-submit']) }}

            <article class="message is-primary">
                <div class="message-header">&nbsp;</div>
                <div class="message-body">

                     @include('users.partials.fields')

                </div>
                <div class="message-footer">&nbsp;</div>
            </article>
            <br />
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('users.index') }}">
                        <i class="fa fa-mail-reply"></i> Volver
                    </a>
                    <div id="spinner" class="sk-spinner sk-spinner-wave pull-right hide">
                        <div class="sk-rect1"></div>
                        <div class="sk-rect2"></div>
                        <div class="sk-rect3"></div>
                        <div class="sk-rect4"></div>
                        <div class="sk-rect5"></div>
                    </div>
                    <button id="btnSubmit" type="submit" class="btn btn-primary pull-right">
                        <i class="mdi mdi-floppy"></i> Guardar
                    </button>
                </div>
            </div>

        {{ Form::close() }}
    </div>

@stop

@section('scripts')
    <script type="text/javascript" src="{{ mix('js/create-edit.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/users/create-edit.js') }}"></script>
@stop
