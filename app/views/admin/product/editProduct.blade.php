@extends('layouts.default')

@section('content')
<div class="span4 offset1">
	<div class="well">
		<legend>Een product wijzigen</legend>

		{{ Form::model($product, array('route' => array('product.update', $product->id), 'method' => 'put', 'roles' => 'form', 'files' => true)) }}

		@if($errors->any())
		<div class="alert alert-error">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</div>
		@endif

		{{ Form::label('name', 'Productnaam') }} </br>
		{{ Form::text('name', $product->name, array('placeholder'=>'Naam', 'class'=>'form-control')) }} </br>

		{{ Form::label('price', 'Prijs') }} </br>
		<?php echo '<input value="'.$product->price.'" name="price" type="number" min="0.01" step="0.01" placeholder="0.00" class="form-control">'; ?> </br>

		{{ Form::label('shortDescription', 'Korte omschrijving') }} </br>
		{{ Form::text('shortDescription', $product->shortDescription, array('class'=>'form-control')) }} </br>

		{{ Form::label('description', 'Lange omschrijving') }} </br>
		{{ Form::textarea('description', $product->description, array('class'=>'form-control', 'rows'=>'3')) }} </br>

		{{ Form::label('category', 'Categorie') }} </br>
		{{ Form::select('category', $categories, $product->category_id, array('class'=>'form-control')) }} </br>

		{{ Form::label('image', 'Afbeelding') }} </br>
		{{ Form::file('image') }} </br>
		<p>Kies alleen een beelding als u die wil veranderen.</p></br>

		{{ Form::submit('Opslaan', array('class'=>'btn btn-success')) }}
		{{ HTML::link('admin', 'Annuleer', array('class'=>'btn btn-danger'))  }}

		{{ Form::close() }}

		<!--<p>wilt u de afbeelding veranderen? klik dan {{ HTML::linkRoute('product.image', 'hier', array($product->id)) }}.</p>-->
	</div>
</div>
@stop

