@extends('layouts.default')

@section('content')
	<h1>{{ $product->name }}</h1>
	<h2>{{ $product->price }}</h2>

	{{ HTML::image('images/200x200/'.$product->imageName, $product->imageName) }}

	<p>{{ $product->description }}<p>
@stop