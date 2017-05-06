@extends('layouts.master')

@section('title') Editar Asistente @stop

@section('title-header') Editar Asistente @stop

@section('breadcrumb')
    <li><a href="{{ route('assistances.index') }}">Asistentes</a></li>
    <li class="active"><strong>Editar</strong></li>
@stop

@section('content')

    @include('layouts.messages.error')

    <div class="section animated fadeInRight">
        {{ Form::model($assistance, ['route' => ['assistances.update', $assistance], 'method' => 'PUT', 'id' => 'form-submit']) }}

            <article class="message is-primary">
                <div class="message-header">&nbsp;</div>
                    <div class="message-body">

                        @include('assistances.partials.fields')

                    </div>
                <div class="message-footer">&nbsp;</div>
            </article>
            <br />
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('assistances.index') }}">
                        <i class="fa fa-mail-reply"></i> Volver
                    </a>
                    <div id="spinner" class="sk-spinner sk-spinner-double-bounce hide pull-right">
                        <div class="sk-double-bounce1"></div>
                        <div class="sk-double-bounce2"></div>
                    </div>
                    <button id="btnSubmit" type="submit" class="btn btn-primary pull-right">
                        <i class="mdi mdi-floppy"></i> Actualizar
                    </button>
                </div>
            </div>

        {{ Form::close() }}
    </div>

@stop

@section('scripts')
    <script type="text/javascript" src="{{ mix('js/create-edit.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/assistances/create-edit.js') }}"></script>
@stop