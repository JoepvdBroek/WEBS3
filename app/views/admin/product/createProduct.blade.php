@extends('layouts.default')

@section('content')
<div class="span4 offset1">
	<div class="well">
		<legend>Nieuw product aanmaken</legend>

		{{ Form::open(array('route'=>'product.store', 'role'=>'form', 'files'=> true)) }}

		@if($errors->any())
		<div class="alert alert-error">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</div>
		@endif

		{{ Form::label('name', 'Productnaam') }} </br>
		{{ Form::text('name', '', array('placeholder'=>'Naam', 'class'=>'form-control')) }} </br>

		{{ Form::label('price', 'Prijs') }} </br>
		<?php echo '<input name="price" type="number" min="0.01" step="0.01" placeholder="0.00" class="form-control">'; ?> </br>

		{{ Form::label('shortDescription', 'Korte omschrijving') }} </br>
		{{ Form::text('shortDescription', '', array('class'=>'form-control')) }} </br>

		{{ Form::label('description', 'Lange omschrijving') }} </br>
		{{ Form::textarea('description', '', array('class'=>'form-control', 'rows'=>'3')) }} </br>

		{{ Form::label('category', 'Categorie') }} </br>
		{{ Form::select('category', $categories, null, array('class'=>'form-control')) }} </br>

		{{ Form::label('image', 'Afbeelding') }} </br>
		{{ Form::file('image') }} </br>

		{{ Form::submit('Aanmaken', array('class'=>'btn btn-success')) }}
		{{ HTML::link('admin', 'Annuleer', array('class'=>'btn btn-danger'))  }}

		{{ Form::close() }}
	</div>
</div>
@stop

