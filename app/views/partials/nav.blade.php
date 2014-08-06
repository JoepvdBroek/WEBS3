    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class='sr-only'>Toggle Navigatie</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                {{ HTML::link('/', 'Home', array('class'=>'navbar-brand')) }}
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            
            <div class="collapse navbar-collapse navbar-ex1-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
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