@extends('layouts.nosidebar')

@section('content')
<div class="row">
<div class="col-lg-12">
	<h3>welcome {{ ucwords(Auth::user()->username) }} </h3>

	</br > 
	{{ HTML::linkRoute('product.create', 'Niewe Product Aanmaken') }}</br>
	{{ HTML::linkRoute('category.create', 'Niewe Categorie Aanmaken') }}</br>
<hr>

	<span class="caret"></span> <span id='toggle1' class="clickable">Een Product Wijzigen</span>
	<div id="hide1">
	<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Naam</td>
			<td>Prijs</td>
			<td>Categorie</td>
			<td>Korte omschrijving</td>
			<td>Lange omschrijving</td>
			<td>Afbeelding</td>
			<td>Acties</td>
		</tr>
	</thead>
	<tbody>
	@foreach($products as $product)
		<tr>
			<td>{{ $product->id }}</td>
			<td>{{ $product->name }}</td>
			<td>{{ $product->price }}</td>
			<td>{{ Category::find($product->category_id)->name }}</td>
			<td>{{ $product->shortDescription }}</td>
			<td>{{ substr($product->description, 0, 120) }} {{ HTML::link('product/'.$product->id, '[...]', array($product->id)) }}</td>
			<td>{{ HTML::image('images/100x100/'.$product->imageName, $product->imageName) }}</td>
			<td>
				<a class="btn btn-small btn-success" href="{{ URL::to('product/' . $product->id) }}">Bekijk</a>
				<a class="btn btn-small btn-info" href="{{ URL::to('product/' . $product->id . '/edit') }}">Wijzig</a>
				{{ Form::open(array('route'=>array('product.destroy', $product->id), 'method'=>'delete')) }}
				{{ Form::submit('Verwijder', array('class'=>'btn btn-danger')) }}
				{{ Form::close() }}
			</td>
		</tr>
	@endforeach
	</tbody>
	</table>
	</div>
	</br>

	<span class="caret"></span> <span id='toggle2'class="clickable">Een Categorie Wijzigen</span>
	<div id="hide2">
	<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Naam</td>
			<td>Parent</td>
			<td>Acties</td>
		</tr>
	</thead>
	<tbody>
	@foreach($categories as $category)
		<tr>
			<td>{{ $category->id }}</td>
			<td>{{ $category->name }}</td>
			<td>
			@if($category->parent === 0)
				Is zelf een Ouder
			@else
				{{ Category::find($category->parent)->name }}
			@endif
			</td>
			<td>
				<a class="btn btn-small btn-success" href="{{ URL::to('category/' . $category->id) }}">Bekijk</a>
				<a class="btn btn-small btn-info" href="{{ URL::to('category/' . $category->id . '/edit') }}">Wijzig</a>
				{{ Form::open(array('route'=>array('category.destroy', $category->id), 'method'=>'delete')) }}
				{{ Form::submit('Verwijder', array('class'=>'btn btn-danger')) }}
				{{ Form::close() }}
			</td>
		</tr>
	@endforeach
	</tbody>
	</table>
	</div>

	<hr>

	<span class="caret"></span> <span id='toggle3'class="clickable">Alle Bestellingen</span>
	<div id="hide3">
	
	@foreach($orders as $order)
	
		<div class="row">
			<div class="col-lg-6">
			Bestelling ID: {{ $order->id }}<br>
			Gebruikersnaam: {{ User::find($order->user_id)->username }}
			
			<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<td>Product</td>
					<td>Aaatal</td>
				</tr>
			</thead>
			<tbody>
			@foreach(DB::table('products_by_order')->where('order_id', $order->id)->get() as $row)
				<tr>
					<td>{{ Product::find($row->product_id)->name }}</td>
					<td>{{ $row->amount }}</td>
				</tr>
			@endforeach
			</tbody>
			</table>	
			</div>	
		</div>
	@endforeach
	
	</div>


	

</div>
</div>
@stop