<!DOCTYPE html>
<html lang="en">
<head>
    
	@include('partials/header')

</head>

<body style="padding-top: 70px;">

    @include('partials/nav')

<div class="container">
    <div class="row">

        <div class="col-lg-8">
            @yield('content')
        </div>
    
        @include('partials/sidebar')

    </div><!-- /.row -->

    @include('partials/footer')

</div><!-- /.container -->
	
</body>
</html>