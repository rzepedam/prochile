@extends('layouts.master')

@section('content')

    {!! Form::open(['url' => '#']) !!}

        @include('clients.sections.fields')

    {{ Form::close() }}

@stop