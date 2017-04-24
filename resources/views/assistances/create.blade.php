@extends('layouts.master')

@section('title') Crear Asistente @stop

@section('title-header') Crear Asistente @stop

@section('breadcrumb')
    <li><a href="{{ route('assistances.index') }}">Asistentes</a></li>
    <li class="active"><strong>Nuevo</strong></li>
@stop

@section('content')

    <div class="section">
        <article class="message is-primary">
            <div class="message-header"></div>
            <div class="message-body">

                {!! Form::open(['url' => '#']) !!}

                    @include('assistances.sections.fields')

                {{ Form::close() }}

            </div>
        </article>
    </div>

@stop