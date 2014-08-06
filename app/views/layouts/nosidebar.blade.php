<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $title }}</title>
    {{ HTML::script('http://code.jquery.com/jquery.js') }}
    {{ HTML::script('js/bootstrap.js') }}
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::script('js/javascript.js') }}

</head>

<body style="padding-top: 70px;">

    @include('partials/nav')

<div class="container">
    <div class="row">

        <div class="col-lg-12">
            @yield('content')
        </div>
        
    </div><!-- /.row -->

    @include('partials/footer')

</div><!-- /.container -->
	
</body>
</html>