@extends('layouts.default')

@section('content')

<h1>Categorie Pagina</h1>

@foreach ($products as $product) 
	<h2>{{ $product->name }}</h1>
	<h3>{{ $product->price }}</h2>

	<p>{{ $product->shortDescription }}<p></br></br>
@endforeach

@stop