{{-- Primer Nombre text field --}}
<div class="col-xs-12 col-sm-4 col-md-4 form-group">
    {{ Form::label('first_name', 'Primer Nombre') }}
    {{ Form::text('first_name', null, ['class' => 'control']) }}
</div>
<label class="label">Name</label>
<p class="control"><input type="text" placeholder="Text input" class="input"></p>
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
{{-- Sector Induistrial select field --}}
<div class="col-xs-12 col-sm-4 col-md-4 form-group">
    {{ Form::label('industry_id', 'Sector Induistrial') }}
    {{ Form::select('industry_id', $industries, null, ['class' => 'form-control']) }}
</div>
{{-- Teléfono text field --}}
<div class="col-xs-12 col-sm-4 col-md-4 form-group">
    {{ Form::label('phone', 'Teléfono') }}
    {{ Form::text('phone', null, ['class' => 'form-control']) }}
</div>
{{-- Email text field --}}
<div class="col-xs-12 col-sm-4 col-md-4 form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', null, ['class' => 'form-control']) }}
</div>