@extends('layouts.nosidebar')

@section('content')
<div class="span4 offset1">
	<div class="well">
		<legend>Niewe Categorie aanmaken</legend>

		{{ Form::open(array('route'=>'category.store', 'role'=>'form')) }}

		@if($errors->any())
		<div class="alert alert-error">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</div>
		@endif
		<div class="control-group">
		{{ Form::label('name', 'Categorienaam') }}
		{{ Form::text('name', '', array('class'=>'form-control')) }}
		</div>
		<br>
		<div class="control-group">
		{{ Form::label('parent', 'Ouder') }}
		{{ Form::select('parent', $categories, null, array('class'=>'form-control')) }}
		<br>
		<p>Geen ouder geeft aan dat het zelf een ouder is</p>
		</div>
		<br>
		{{ Form::submit('Aanmaken', array('class'=>'btn btn-success')) }}
		{{ HTML::link('admin', 'Annuleer', array('class'=>'btn btn-danger'))  }}

		{{ Form::close() }}
	</div>
</div>
@stop