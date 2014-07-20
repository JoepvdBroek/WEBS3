@extends('layouts.default')

@section('content')

{{ Form::open(array('route'=>'newCategory')) }}

{{ Form::label('name', 'Categorienaam') }} </br>
{{ Form::text('name') }} </br>

{{ Form::label('parent', 'Ouder') }} </br>
{{ Form::select('parent', array('0'=>'Geen ouder', '1'=>'Verzorging', '2'=>'Boeken', '3'=>'Speelgoed')) }} </br>

<p>Geen ouder geeft aan dat het zelf een ouder is</p>
<!--{{ Form::file('image') }} </br></br>-->

{{ Form::submit('Aanmaken') }}

{{ Form::close() }}

@stop