<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $title }}</title>
    {{ HTML::script('http://code.jquery.com/jquery.js') }}
    {{ HTML::script('js/bootstrap.js') }}
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::script('js/javascript.js') }}

</head>

<header>

<?php $categories = Category::where('parent', '=', '0')->get(); ?>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        {{ HTML::link('/', 'Home', array('class'=>'navbar-brand')) }}<br>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            @foreach($categories as $category)
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $category->name }}<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                    <?php $subcategories = Category::where('parent', '=', $category->id)->get(); ?>
                        @foreach($subcategories as $sub)
                            <li>{{ HTML::linkRoute('category', $sub->name, $sub->id) }}</li>
                        @endforeach
                    </ul>
            @endforeach
        </ul>

        <ul class="nav navbar-nav navbar-right">
            @if(Auth::user())
                <li>{{ HTML::link('admin', ucwords(Auth::user()->username)) }}</li>
                <li>{{ HTML::link('logout', 'Logout') }}</li>
            @else
                <li>{{ HTML::link('login', 'Login') }}</li>
            @endif
        </ul>      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</header>
<body class="container">
	@yield('content')
</body>
</html>