@extends('layouts.default')

@section('content')
<div class="span4 offset1">
	<div class="well">
		<legend>Register</legend>

		{{ Form::open(array('url'=>'register', 'role'=>'form')) }}

		@if($errors->any())
		<div class="alert alert-error">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</div>
		@endif

		{{ Form::text('username', '', array('placeholder'=>'Username', 'class'=>'form-control')) }}<br>

		{{ Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control')) }}<br>

		{{ Form::submit('register', array('class'=>'btn btn-success')) }}

		{{ HTML::link('/', 'Cancel', array('class'=>'btn btn-danger')) }}<br>
		
		{{ Form::close() }}

		<p>toch wel één account, login dan {{ HTML::link('login', 'hier')}} in.</p>
	</div>
</div>
@stop