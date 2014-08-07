@extends('layouts.default')

@section('content')
	<h1>Product Home Page</h1>

<?php $product1 = Product::find(1); $product2 = Product::find(2); $product3 = Product::find(3); ?>
	
<div class="row">
  <div class="col-sm-6 col-md-4">
  	<div class="thumbnail">
    {{ HTML::image('images/200x200/'.$product1->imageName, $product1->imageName) }}
      <div class="caption">
        <h3>{{ $product1->name}}</h3>
		<p>{{ $product1->shortDescription }}</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
  	<div class="thumbnail">
    {{ HTML::image('images/200x200/'.$product2->imageName, $product1->imageName) }}
      <div class="caption">
        <h3>{{ $product2->name}}</h3>
		<p>{{ $product2->shortDescription }}</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
  	<div class="thumbnail">
    {{ HTML::image('images/200x200/'.$product3->imageName, $product1->imageName) }}
      <div class="caption">
        <h3>{{ $product3->name}}</h3>
		<p>{{ $product3->shortDescription }}</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
</div>

<hr>

<div class="row">
  <div class="col-sm-6 col-md-4">
  	<div class="thumbnail">
    {{ HTML::image('images/200x200/'.$product1->imageName, $product1->imageName) }}
      <div class="caption">
        <h3>{{ $product1->name}}</h3>
		<p>{{ $product1->shortDescription }}</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
  	<div class="thumbnail">
    {{ HTML::image('images/200x200/'.$product2->imageName, $product1->imageName) }}
      <div class="caption">
        <h3>{{ $product2->name}}</h3>
		<p>{{ $product2->shortDescription }}</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
  	<div class="thumbnail">
    {{ HTML::image('images/200x200/'.$product3->imageName, $product1->imageName) }}
      <div class="caption">
        <h3>{{ $product3->name}}</h3>
		<p>{{ $product3->shortDescription }}</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
</div>
	
@stop