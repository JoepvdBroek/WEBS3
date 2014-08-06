@extends('layouts.nosidebar')

@section('content')
<div class="col-lg-3"></div>
<div class="col-lg-6">
	<div class="well">
		<legend>Nieuw product aanmaken</legend>

		{{ Form::open(array('route'=>'product.store', 'role'=>'form', 'files'=> true)) }}

		@if($errors->any())
		<!--<div class="alert alert-error">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</div>-->

		<div class="alert alert-dismissable alert-danger">
		  	<button type="button" class="close" data-dismiss="alert">×</button>
		  	{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</div>
		@endif

		<div class="control-group">
		{{ Form::label('name', 'Productnaam') }}
		{{ Form::text('name', '', array('placeholder'=>'Naam', 'class'=>'form-control')) }}
		</div>
		<br>
		<div class="control-group">
		{{ Form::label('price', 'Prijs') }}
		<?php echo '<input name="price" type="number" min="0.01" step="0.01" placeholder="0.00" class="form-control">'; ?>
		</div>
		<br>
		<div class="control-group">
		{{ Form::label('shortDescription', 'Korte omschrijving') }}
		{{ Form::text('shortDescription', '', array('class'=>'form-control')) }}
		</div>
		<br>
		<div class="control-group">
		{{ Form::label('description', 'Lange omschrijving') }}
		{{ Form::textarea('description', '', array('class'=>'form-control', 'rows'=>'3', 'style'=>'max-width:500px;')) }}
		</div>
		<br>
		<div class="control-group">
		{{ Form::label('category', 'Categorie') }}
		{{ Form::select('category', $categories, null, array('class'=>'form-control')) }}
		</div>
		<br>
		<div class="control-group">
		{{ Form::label('image', 'Afbeelding') }} 
		{{ Form::file('image') }} 
		</div>
		<br>
		{{ Form::submit('Aanmaken', array('class'=>'btn btn-success')) }}
		{{ HTML::link('admin', 'Annuleer', array('class'=>'btn btn-danger'))  }}

		{{ Form::close() }}
	</div>
</div>
<div class="col-lg-3"></div>
@stop

