@extends('layouts.default')

@section('content')
<div class="span4 offset1">
	<div class="well">
		<legend>Een afbeelding wijzigen</legend>

		{{ Form::open(array('route'=>'updateImage', 'role'=>'form', 'files'=> true)) }}

		@if($errors->any())
		<div class="alert alert-error">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</div>
		@endif

		Huidig Afbeelding:</br>

		{{ HTML::image('images/'.$product->imageName, $product->imageName) }}</br>

		{{ Form::label('image', 'Nieuw Afbeelding') }} </br>
		{{ Form::file('image') }} </br>

		{{ Form::text('id', $product->id, array('hidden'=>'hidden')) }}

		{{ Form::submit('Opslaan', array('class'=>'btn btn-success')) }}
		{{ HTML::link('admin', 'Annuleer', array('class'=>'btn btn-danger')) }}

		{{ Form::close() }}
	</div>
</div>
@stop

