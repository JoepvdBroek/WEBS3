@extends('layouts.default')

@section('content')
	<h1>{{ $product->name }}</h1>
	<h2>{{ $product->price }}</h2>

	<p>{{ $product->description }}<p>
@stop