@extends('layouts.default')

@section('content')

<h1>{{ ucwords($title) }}</h1>
@if($products->count())
<!--
	<?php $number = 0; ?>

	@foreach($products as $product)
		@if($number = 0 || $number%3===0)
		<div class="row">
		@endif
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      {{ HTML::image('images/200x200/'.$product->imageName, $product->imageName) }}
		      <div class="caption">
		        <h3>{{ $product->name}}</h3>
		        <p>{{ $product->shortDescription }}</p>
		        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
		      </div>
		    </div>
		  </div>
		@if($number = 0 || $number%3===0)
		</div>
		@endif
		<?php $number = $number + 1; ?>
	@endforeach
-->
	@foreach ($products as $product) 
		<h2>{{ HTML::linkRoute('product.show', $product->name, array($product->id)) }}</h2>
		<h3>{{ $product->price }}</h2>

		<p>{{ $product->shortDescription }}<p></br></br>
	@endforeach
@else
	<p>Helaas zijn er nog geen producten onder dit categorie.</p>
@endif
@stop