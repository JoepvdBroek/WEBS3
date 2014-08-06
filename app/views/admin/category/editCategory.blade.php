@extends('layouts.nosidebar')

@section('content')
<div class="col-lg-3"></div>
<div class="col-lg-6">
	<div class="well">
		<legend>Een categorie wijzigen</legend>

		{{ Form::model($category, array('route' => array('category.update', $category->id), 'method' => 'put', 'roles' => 'form')) }}

		@if($errors->any())
		<div class="alert alert-error">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</div>
		@endif
		<div class="control-group">
		{{ Form::label('name', 'Categorienaam') }}
		{{ Form::text('name', $category->name, array('class'=>'form-control', 'placeholder'=>'Naam')) }}
		</div>
		<br>
		<div class="control-group">
		{{ Form::label('parent', 'Ouder') }}
		{{ Form::select('parent', $categories, $category->parent, array('class'=>'form-control')) }}
		<br>
		<p>Geen ouder geeft aan dat het zelf een ouder is</p>
		</div>
		<br>
		{{ Form::submit('Opslaan', array('class'=>'btn btn-success')) }}
		{{ HTML::link('admin', 'Annuleer', array('class'=>'btn btn-danger'))  }}

		{{ Form::close() }}
	</div>
</div>
<div class="col-lg-3"></div>
@stop