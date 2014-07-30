@extends('layouts.default')

@section('content')

<div class="span12 well">
	<h3>welcome {{ Auth::user()->username }} </h3>

	</br > 
	{{ HTML::linkRoute('createProduct', 'Niewe Product Aanmaken') }}</br>
	{{ HTML::linkRoute('createCategory', 'Niewe Categorie Aanmaken') }}

</div>
@stop