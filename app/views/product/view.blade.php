@extends('layouts.default')

@section('content')
	<h1>{{ $product->name }}</h1>
	<h2>&#8364; {{ $product->price }}</h2>

	{{ HTML::image('images/200x200/'.$product->imageName, $product->imageName) }}

	<p>{{ $product->description }}<p>

	<button onclick="addToCart({{$product->id}})" class="btn btn-default" role="button">
		<span class="glyphicon glyphicon-shopping-cart">Toevoegen</span>
	</button>
@stop