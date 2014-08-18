@extends('layouts.nosidebar')

@section('content')
<div class="col-lg-4"></div>
<div class="col-lg-4">
	<div class="well">
		<legend>Login</legend>
		
		{{ Form::open(array('url'=>'login', 'role'=>'form')) }}

		@if($errors->any())
		<div class="alert alert-error">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</div>
		@endif

		{{ Form::text('username', '', array('placeholder'=>'Gebruikersnaam', 'class'=>'form-control')) }}<br>

		{{ Form::password('password', array('placeholder'=>'Wachtwoord', 'class'=>'form-control')) }}<br>

		{{ Form::submit('Login', array('class'=>'btn btn-success')) }}

		{{ HTML::link('register', 'Registreer', array('class'=>'btn btn-primary')) }}

		{{ Form::close() }}
	</div>
</div>
<div class="col-lg-4"></div>
@stop