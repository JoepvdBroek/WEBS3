@extends('layouts.default')

@section('content')
	<h1>Product Home Page</h1>

	
	@foreach ($products as $product) 
		
		{{ HTML::linkRoute('product', $product->name, array($product->id)) }}</br >
	
	@endforeach

	{{ public_path() }}
	
@stop