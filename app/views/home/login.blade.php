@extends('layouts.default')

@section('content')
<div class="span4 offset1">
	<div class="well">
		<legend>Login</legend>
		{{ Form::open(array('url'=>'login')) }}
		@if($errors->any())
		<div class="alert alert-error">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			{{ implode('', $error->all('<li class="error">:message</li>')) }}
		</div>
		@endif
		{{ Form::text('username', '', array('placeholder'=>'Username')) }}<br>
		{{ Form::password('password', array('placeholder'=>'Password')) }}<br>
		{{ Form::submit('login', array('class'=>'btn btn-success')) }}
		{{ HTML::link('register', 'Register', array('class'=>'btn btn-primary')) }}
		{{ Form::close() }}
	</div>
</div>
@stop