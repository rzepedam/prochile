<div class="row">
    {{-- Primer Nombre text field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label('first_name', 'Primer Nombre') }}
        {{ Form::text('first_name', null, ['class' => 'form-control']) }}
    </div>
    {{-- Apellido Paterno text field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label('male_surname', 'Apellido Paterno') }}
        {{ Form::text('male_surname', null, ['class' => 'form-control']) }}
    </div>
    {{-- Apellido Materno text field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label('female_surname', 'Apellido Materno') }}
        {{ Form::text('female_surname', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="row">
    {{-- Rut text field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label('rut', 'Rut') }}
        {{ Form::text('rut', null, ['class' => 'form-control']) }}
    </div>
    {{-- Empresa select field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label('company_id', 'Empresa') }}
        {{ Form::select('company_id', $companies, null, ['class' => 'form-control']) }}
    </div>
    {{-- Sector Industrial select field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label('industry_id', 'Sector Industrial.') }}
        {{ Form::select('industry_id', $industries, null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="row">
    {{-- Teléfono text field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label('phone', 'Teléfono') }}
        {{ Form::text('phone', null, ['class' => 'form-control']) }}
    </div>
    {{-- Email text field --}}
    <div class="col-xs-12 col-sm-8 col-md- form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', null, ['class' => 'form-control']) }}
    </div>
</div>