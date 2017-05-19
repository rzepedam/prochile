<div class="row">
    @if (auth()->user()->role->id == 1)
        {{-- Rol select field --}}
        <div class="col-xs-12 col-sm-4 col-md-4 form-group">
            {{ Form::label('role_id', 'Rol') }}
            {{ Form::select('role_id', $roles, null, ['class' => 'form-control']) }}
        </div>
    @endif
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
    @if (Route::is('users.edit'))
        {{-- Password field --}}
        <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        	{{ Form::label('password', 'Password') }}
        	{{ Form::password('password', ['class' => 'form-control']) }}
        </div>
        {{-- Confirmar Password field --}}
        <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        	{{ Form::label('password_confirmation', 'Confirmar Password') }}
        	{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
        </div>
    @endif
    {{-- Email text field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
    </div>
</div>