<div class="row">
    {{-- Rol select field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
    	{{ Form::label('role_id', 'Rol') }}
    	{{ Form::select('role_id', $roles, null, ['class' => 'form-control']) }}
    </div>
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
    {{-- Email text field --}}
    <div class="col-xs-12 col-sm-6 col-md-6 form-group">
    	{{ Form::label('email', 'Email') }}
    	{{ Form::text('email', null, ['class' => 'form-control']) }}
    </div>
</div>