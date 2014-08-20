<!DOCTYPE html>
<html lang="en">
<head>
    
	@include('partials/header')
<script language="javascript" src="js/carrousel.js"></script>
</head>

<body onload="itemSize()">

    @include('partials/nav')

<div class="container">
    <div class="row">

        <div class="col-lg-8">

            @yield('content')
        </div>
    
        @include('partials/sidebar2')

    </div><!-- /.row -->

    @include('partials/footer')

</div><!-- /.container -->
	
</body>
</html>