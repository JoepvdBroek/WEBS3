@extends('layouts.nosidebar')

@section('content')
  <h1>Winkelwagen</h1>

 	@if(Cart::totalItems(true) > 0)
	<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Naam</td>
			<td>Prijs</td>
			<td>Aantal</td>
			<td>Acties</td>
		</tr>
	</thead>
	<tbody>	
        @foreach(Cart::contents() as $item)
        <tr>
			<td>{{ $item->name }}</td>
			<td>&#8364; {{ $item->price }}</td>
			<td>
				<a class="clickable" onclick="decreaseQuantity({{$item->id}})"><span class="glyphicon glyphicon-minus"></span></a>
				<span id="quantity{{ $item->id }}"> {{ $item->quantity }} </span>
				<a class="clickable" onclick="increaseQuantity({{$item->id}})"><span class="glyphicon glyphicon-plus" ></span></a>
			</td>
			<td>{{ HTML::linkRoute('cart.delete', 'verwijderen', $item->id) }}</td>
		</tr>
        @endforeach
    
		
	</tbody>
	</table>

	{{ HTML::linkRoute('cart.empty', 'Winkelwagen leegmaken') }}
	@else
        <h3>Uw Winkelwagen is leeg</h3>
    @endif
	
@stop