@extends('layouts.master')

@section('title') Editar Asistente @stop

@section('title-header') Editar Asistente @stop

@section('breadcrumb')
    <li><a href="{{ route('assistances.index') }}">Asistentes</a></li>
    <li class="active"><strong>Editar</strong></li>
@stop

@section('content')

    {{ Form::model($assistance, ['route' => ['assistances.update', $assistance]]) }}

        <div class="ibox float-e-margins animated fadeInRight">
            <div class="ibox-content">

                @include('assistances.sections.fields')

            </div>
        </div>

    {{ Form::close() }}

@stop