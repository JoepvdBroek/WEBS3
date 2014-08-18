@extends('layouts.nosidebar')

@section('content')
<div class="col-lg-4"></div>
<div class="col-lg-4">
	<div class="well">
		<legend>Register</legend>

		{{ Form::open(array('url'=>'register', 'role'=>'form')) }}

		@if($errors->any())
		<div class="alert alert-error">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</div>
		@endif

		{{ Form::text('username', '', array('placeholder'=>'Gebruikersnaam', 'class'=>'form-control')) }}<br>

		{{ Form::password('password', array('placeholder'=>'Wachtwoord', 'class'=>'form-control')) }}<br>

		{{ Form::submit('Registreer', array('class'=>'btn btn-success')) }}

		{{ HTML::link('/', 'Annuleer', array('class'=>'btn btn-danger')) }}<br>
		
		{{ Form::close() }}

		<p>Toch wel een account, login dan {{ HTML::link('login', 'hier')}} in.</p>
	</div>
</div>
<div class="col-lg-4"></div>
@stop