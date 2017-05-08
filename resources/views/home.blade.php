@extends('layouts.master')

@section('title') Reportes @stop

@section('title-header') Reportes @stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <canvas id="nationality" height="200"></canvas>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <canvas id="gender" height="200"></canvas>
        </div>
    </div>
    <div class="row clearfix"><br /><br /><br /></div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <canvas id="time_lapse"></canvas>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <canvas id="industry"></canvas>
        </div>
    </div>
    <div class="row clearfix"><br /><br /><br /></div>
    <div class="col-xs-12 col-md-offset-3 col-sm-12 col-md-6">
        <canvas id="type_assistance" height="200"></canvas>
    </div>
    <div class="clearfix"></div>
    <buttton id="save-btn" class="btn btn-primary">Export</buttton>
@stop

@section('scripts')
    <script src="/js/canvas-toBlob.js"></script>
    <script src="{{ mix('/js/reports.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function () {

            $("#save-btn").click(function() {
                $("#nationality").get(0).toBlob(function(blob) {
                    saveAs(blob, "nationality.png");
                });
                $("#gender").get(0).toBlob(function(blob) {
                    saveAs(blob, "gender.png");
                });
                $("#time_lapse").get(0).toBlob(function(blob) {
                    saveAs(blob, "time_lapse.png");
                });
                $("#industry").get(0).toBlob(function(blob) {
                    saveAs(blob, "industry.png");
                });
                $("#type_assistance").get(0).toBlob(function(blob) {
                    saveAs(blob, "type_assistance.png");
                });
            });

            // Nationality
            var ctx           = document.getElementById("nationality");
            var countries     = {!! $nationalities->keys() !!};
            var num_countries = {!! $nationalities->values() !!};
            var colorsNat     = {!! json_encode(array_slice(config('constants.colors'), 0, $nationalities->count())) !!};
            var bordersNat    = {!! json_encode(array_slice(config('constants.borders'), 0, $nationalities->count())) !!};

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: countries,
                    datasets: [{
                        data: num_countries,
                        backgroundColor: colorsNat,
                        hoverBackgroundColor: bordersNat
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Nacionalidad'
                    }
                }
            });

            // Gender
            var ctx2       = document.getElementById("gender");
            var genders    = {!! $genders->values() !!};
            var colorsGen  = {!! json_encode(array_slice(config('constants.colors'), 0, $genders->count())) !!};
            var bordersGen = {!! json_encode(array_slice(config('constants.borders'), 0, $genders->count())) !!};

            new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: ['Masculino', 'Femenino'],
                    datasets: [{
                        data: genders,
                        backgroundColor: colorsGen,
                        hoverBackgroundColor: bordersGen
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Género'
                    }
                }
            });

            // Lapse Time
            var ctx3         = document.getElementById("time_lapse");
            var lapseTime    = {!! $lapseTime->values() !!};
            var colorsLapse  = {!! json_encode(array_slice(config('constants.colors'), 0, $lapseTime->count())) !!};
            var bordersLapse = {!! json_encode(array_slice(config('constants.borders'), 0, $lapseTime->count())) !!};

            new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels: ["8:00-8:15", "8:15-8:30", "8:30-8:45", "8:45-9:00"],
                    datasets: [
                        {
                            label: "Asistentes",
                            backgroundColor: colorsLapse,
                            borderColor: bordersLapse,
                            data: lapseTime,
                        }
                    ]
                },
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Periodos 15 min.'
                    }
                }
            });

            // Industry
            var ctx4          = document.getElementById("industry");
            var industries    = {!! $industries->keys() !!};
            var numIndustries = {!! $industries->values() !!};
            var colorsInd     = {!! json_encode(array_slice(config('constants.colors'), 0, $industries->count())) !!};
            var bordersInd    = {!! json_encode(array_slice(config('constants.borders'), 0, $industries->count())) !!};

            new Chart(ctx4, {
                type: 'horizontalBar',
                data: {
                    labels: industries,
                    datasets: [
                        {
                            label: "Asistentes",
                            backgroundColor: colorsInd,
                            borderColor: bordersInd,
                            data: numIndustries,
                        }
                    ]
                },
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                        }
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Sector Industrial'
                    }
                }
            });

            // TypeAssistances
            var ctx5               = document.getElementById("type_assistance");
            var typeAssistances    = {!! $typeAssistances->keys() !!};
            var numTypeAssistances = {!! $typeAssistances->values() !!};
            var colorsTypeAsis     = {!! json_encode(array_slice(config('constants.colors'), 0, $typeAssistances->count())) !!};
            var bordersTypeAsis    = {!! json_encode(array_slice(config('constants.borders'), 0, $typeAssistances->count())) !!};

            new Chart(ctx5, {
                type: 'pie',
                data: {
                    labels: typeAssistances,
                    datasets: [{
                        data: numTypeAssistances,
                        backgroundColor: colorsTypeAsis,
                        hoverBackgroundColor: bordersTypeAsis
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Tipo Asistente'
                    }
                }
            });
        });
    </script>
@stop

