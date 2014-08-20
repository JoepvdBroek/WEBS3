@extends('layouts.nosidebar')

@section('content')
<div class="row">
	<div class="col-lg-12">
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
			<td id="price{{ $item->id }}">&#8364; {{ ($item->price*$item->quantity) }}</td>
			<td>
				<a class="clickable" onclick="decreaseQuantity({{$item->id}})"><span class="glyphicon glyphicon-minus"></span></a>
				<span id="quantity{{ $item->id }}"> {{ $item->quantity }} </span>
				<a class="clickable" onclick="increaseQuantity({{$item->id}})"><span class="glyphicon glyphicon-plus" ></span></a>
			</td>
			<td>{{ HTML::linkRoute('cart.delete', 'verwijderen', $item->id) }}</td>
		</tr>
        @endforeach
    
		<tr>
			<td colspan="4"><div id="total" style="float:right;">Totaal prijs: &#8364; {{ Cart::total(); }}</div></td>
		</tr>
	</tbody>
	</table>
	</div>
</div>
	{{ HTML::linkRoute('cart.empty', 'Winkelwagen leegmaken') }}
	@else
        <h3>Uw Winkelwagen is leeg</h3>
    </div>
    @endif
	
@stop