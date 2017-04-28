@extends('layouts.master')

@section('title') Inicio @stop

@section('title-header') Bienvenido {{ auth()->user()->name }} @stop

@section('breadcrumb')
    <li class="active"><strong>Inicio</strong></li>
@stop

@section('content')

    <h1>Gráficos</h1>

@stop

