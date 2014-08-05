@extends('layouts.default')

@section('content')

<h1>{{ ucwords($title) }}</h1>

@foreach ($products as $product) 
	<h2>{{ HTML::linkRoute('product.show', $product->name, array($product->id)) }}</h2>
	<h3>{{ $product->price }}</h2>

	<p>{{ $product->shortDescription }}<p></br></br>
@endforeach

@stop