@extends('layouts.master')

@section('title') Reportes @stop

@section('title-header') Reportes @stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
            <canvas id="nationality" height="200"></canvas>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <canvas id="time_lapse" height="200"></canvas>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <canvas id="gender" height="200"></canvas>
        </div>
    </div>
    <br />
    <br />
    <br />
    <br />
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
            <canvas id="industry" height="200"></canvas>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <canvas id="type_assistance" height="200"></canvas>
        </div>
    </div>

@stop

@section('scripts')
    <script src="{{ mix('js/reports.js') }}"></script>
@stop

