@extends('layouts.default')

@section('content')

<h1>{{ ucwords($title) }}</h1>

@if(isset($products))

	@if($products->count())
		@foreach ($products as $product) 
			<div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      {{ HTML::image('images/200x200/'.$product->imageName, $product->imageName) }}
		      <div class="caption">
		        @if(strlen($product->name) > 25)
		          <div class="productname">
		            <h3>{{ substr($product->name, 0 , 25) }}...</h3>
		          </div>
		        @else
		          <div class="productname">
		            <h3>{{ $product->name }}</h3>
		          </div>
		        @endif		      
		        <p class="price">&#8364; {{ $product->price }}</p>
		        <p>{{ HTML::linkRoute('product.show', 'Bekijk', array($product->id), array('class'=>'btn btn-primary', 'role'=>'button')) }}
		        <button onclick="addToCart({{$product->id}},'{{$product->name}}')" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart">Toevoegen</span></button></p>
		      </div>
		    </div>
		  </div>
		@endforeach
	@else
		<p>Helaas zijn er nog geen producten onder uw ingevoerde zoekterm.</p>
	@endif
@else
	<p>Vergeet niet om het zoekveld in te vullen.</p>
@endif
@stop