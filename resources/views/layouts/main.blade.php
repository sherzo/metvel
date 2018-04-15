<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="asset/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>@yield('title') | {{ config('app.name', 'Metvel') }}</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">

    @yield('css')
</head>
<body>
	<div class="wrapper">

		<div class="sidebar" data-background-color="white" data-active-color="danger">
			@include('layouts.sidebar')
    	</div>

    	<div class="main-panel">
			<nav class="navbar navbar-default">
            	<div class="container-fluid">
                	<div class="navbar-header">
                    	<button type="button" class="navbar-toggle">
                        	<span class="sr-only">Toggle navigation</span>
                        	<span class="icon-bar bar1"></span>
                        	<span class="icon-bar bar2"></span>
                        	<span class="icon-bar bar3"></span>
                    	</button>
                        @yield('subtitle')
                	</div>
                	<div class="collapse navbar-collapse">
	                    <ul class="nav navbar-nav navbar-right">
	                        <li>
	                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                                <i class="ti-panel"></i>
									<p>Configuración</p>
	                            </a>
	                        </li>
	                        <li class="dropdown">
	                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                                    <i class="ti-bell"></i>
	                                    <p class="notification">5</p>
										<p>Notifications</p>
										<b class="caret"></b>
	                              </a>
	                              <ul class="dropdown-menu">
	                                <li><a href="#">Notification 1</a></li>
	                                <li><a href="#">Notification 2</a></li>
	                                <li><a href="#">Notification 3</a></li>
	                                <li><a href="#">Notification 4</a></li>
	                                <li><a href="#">Another notification</a></li>
	                              </ul>
	                        </li>
							<li>
	                            <a href="#">
									<i class="ti-user"></i>
									<p>
                                        {{ Auth::user()->name }}                               
                                    </p>
	                            </a>
	                        </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="ti-exit"></i>
                                    <p>Salir</p>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
	                    </ul>

                	</div>
            	</div>
        	</nav>


        	<div class="content">
	            <div class="container-fluid">
	               @yield('content') 
	            </div>
        	</div>


        	<footer class="footer">
            	<div class="container-fluid">
                	<nav class="pull-left">
                    	<ul>
                        	<li>
                            	<a href="/">
                                Terminos y condiciones
                            	</a>
                        	</li>
                    	</ul>
                	</nav>
					<div class="copyright pull-right">
                    	&copy; <script>document.write(new Date().getFullYear())</script>, Todos los derechos reservados 
                    	<!--<i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a> -->
                	</div>
            	</div>
        	</footer>

    	</div>
	</div>
	 <!--   Core JS Files   -->
    <script src="{{ asset('js/jquery-1.10.2.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{{ asset('js/bootstrap-checkbox-radio.js') }}"></script>

	<!--  Charts Plugin -->
	<script src="{{ asset('js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/bootstrap-notify.js') }}"></script>

    <!--  Google Maps Plugin    -->
    <!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="{{ asset('js/paper-dashboard.js') }}"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="{{ asset('js/demo.js') }}"></script>
    @yield('js')
</body>
</html>