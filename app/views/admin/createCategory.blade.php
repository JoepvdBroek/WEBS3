@extends('layouts.default')

@section('content')
<div class="span4 offset1">
	<div class="well">
		<legend>Niewe Categorie aanmaken</legend>

		{{ Form::open(array('route'=>'newCategory', 'role'=>'form')) }}

		@if($errors->any())
		<div class="alert alert-error">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</div>
		@endif
		
		{{ Form::label('name', 'Categorienaam') }} </br>
		{{ Form::text('name', '', array('class'=>'form-control')) }} </br>

		{{ Form::label('parent', 'Ouder') }} </br>
		{{ Form::select('parent', $categories, null, array('class'=>'form-control')) }} </br>

		<p>Geen ouder geeft aan dat het zelf een ouder is</p>
		<!--{{ Form::file('image') }} </br></br>-->

		{{ Form::submit('Aanmaken', array('class'=>'btn btn-success')) }}
		{{ HTML::link('admin', 'Annuleer', array('class'=>'btn btn-danger'))  }}

		{{ Form::close() }}
	</div>
</div>
@stop