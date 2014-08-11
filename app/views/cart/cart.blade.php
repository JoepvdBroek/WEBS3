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
		</tr>
	</thead>
	<tbody>	
        @foreach(Cart::contents() as $item)
        <tr>
			<td>{{ $item->name }}</td>
			<td>&#8364; {{ $item->price }}</td>
			<td>{{ $item->quantity }}</td>
		</tr>
        @endforeach
    
		
	</tbody>
	</table>
	@else
        <h3>Uw Winkelwagen is nog leeg</h3>
    @endif
	
@stop