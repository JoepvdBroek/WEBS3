@extends('layouts.default')

@section('content')
<div class="span4 offset1">
	<div class="well">
		<legend>Nieuw product aanmaken</legend>

		{{ Form::open(array('route'=>'newProduct', 'role'=>'form')) }}

		{{ Form::label('name', 'Productnaam') }} </br>
		{{ Form::text('name', '', array('placeholder'=>'Naam', 'class'=>'form-control')) }} </br>

		{{ Form::label('price', 'Prijs') }} </br>
		{{ Form::text('price', '0.00', array('placeholder'=>'Prijs', 'class'=>'form-control')) }} </br>
		{{ Form::label('shortDescription', 'Korte omschrijving') }} </br>
		{{ Form::text('shortDescription', '', array('class'=>'form-control')) }} </br>

		{{ Form::label('description', 'Lange omschrijving') }} </br>
		{{ Form::textarea('description', '', array('class'=>'form-control', 'rows'=>'3')) }} </br>

		{{ Form::label('category', 'Categorie') }} </br>
		{{ Form::select('category', $categories, null, array('class'=>'form-control')) }} </br>

		{{ Form::label('image', 'Afbeelding') }} </br>
		{{ Form::file('image') }} </br>

		{{ Form::submit('Aanmaken', array('class'=>'btn btn-success')) }}
		{{ HTML::link('/', 'Annuleer', array('class'=>'btn btn-danger'))  }}

		{{ Form::close() }}
	</div>
</div>
@stop

