@extends('layouts.master')

@section('title') Crear Asistente @stop

@section('title-header') Crear Asistente @stop

@section('breadcrumb')
    <li><a href="{{ route('assistances.index') }}">Asistentes</a></li>
    <li class="active"><strong>Nuevo</strong></li>
@stop

@section('content')

    <div class="section">
        {!! Form::open(['url' => '#']) !!}

            <article class="message is-primary">
                <div class="message-header">&nbsp;</div>
                <div class="message-body">
                     @include('assistances.sections.fields')
                </div>
                <div class="message-footer">&nbsp;</div>
            </article>
            <br />
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('assistances.index') }}">
                        <i class="fa fa-mail-reply"></i> Volver
                    </a>
                    <a href="javascript:void(0)" class="btn btn-primary pull-right">
                        <i class="fa fa-save"></i> Guardar
                    </a>
                </div>
            </div>

        {{ Form::close() }}
    </div>

@stop