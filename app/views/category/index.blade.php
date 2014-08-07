@extends('layouts.default')

@section('content')

<h1>{{ ucwords($title) }}</h1>

@if($products->count())

	@foreach($products as $product)
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail" style="height: 386.500px;">
		      {{ HTML::image('images/200x200/'.$product->imageName, $product->imageName) }}
		      <div class="caption">
		        <h3>{{ $product->name}}</h3>
		        <p>{{ $product->price }}</p>
		        <p>{{ HTML::linkRoute('product.show', 'Bekijk', array($product->id), array('class'=>'btn btn-primary', 'role'=>'button')) }}
		        <a href="{{ URL::to('product/' . $product->id) }}" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart">toevoegen</span></a></p>
		      </div>
		    </div>
		  </div>		
	@endforeach

	<!--@foreach ($products as $product) 
		<h2>{{ HTML::linkRoute('product.show', $product->name, array($product->id)) }}</h2>
		<h3>{{ $product->price }}</h2>

		<p>{{ $product->shortDescription }}<p></br></br>
	@endforeach-->
@else
	<p>Helaas zijn er nog geen producten onder dit categorie.</p>
@endif
@stop