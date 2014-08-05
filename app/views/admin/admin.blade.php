@extends('layouts.default')

@section('content')

<div class="span12 well">
	<h3>welcome {{ ucwords(Auth::user()->username) }} </h3>

	</br > 
	{{ HTML::linkRoute('createProduct', 'Niewe Product Aanmaken') }}</br>
	{{ HTML::link('category/create', 'Niewe Categorie Aanmaken') }}</br>
<hr>
	<span class="caret"></span> <span id='toggle1' style="cursor: pointer;">Een Product Wijzigen</span>
	<div id="hide1">
		@foreach ($products as $product) 
			
			{{ HTML::linkRoute('editProduct', $product->name, array($product->id)) }}</br >
		
		@endforeach
	</div>
	</br>
	<span class="caret"></span> <span id='toggle2' style="cursor: pointer;">Een Categorie Wijzigen</span>
	<div id="hide2">
		@foreach ($categories as $category) 
			
			{{ HTML::linkRoute('editCategory', $category->name, array($category->id)) }}</br >
		
		@endforeach
	</div>

</div>
@stop