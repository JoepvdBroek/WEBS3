@extends('layouts.default')

@section('content')
<h1>Nieuw product aanmaken</h1>

{{ Form::open(array('route'=>'newProduct')) }}

{{ Form::label('name', 'Productnaam') }} </br>
{{ Form::text('name') }} </br>

{{ Form::label('price', 'Prijs') }} </br>
{{ Form::text('price') }} </br>

{{ Form::label('shortDescription', 'Korte omschrijving') }} </br>
{{ Form::text('shortDescription') }} </br>

{{ Form::label('description', 'Lange omschrijving') }} </br>
{{ Form::text('description') }} </br>

{{ Form::label('category', 'Categorie') }} </br>
{{ Form::select('category', $categories) }} </br>

{{ Form::label('image', 'Afbeelding') }} </br>
{{ Form::text('image')}}

<!--{{ Form::file('image') }} </br></br>-->

{{ Form::submit('Aanmaken') }}

{{ Form::close() }}
@stop

