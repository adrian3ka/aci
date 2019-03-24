<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <title>Happy Hummy Club</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{  asset('bootstrap_3_3_7/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{  asset('css/main_layout.css') }}" rel="stylesheet" type="text/css">
		<script src="{{ asset('js/jquery_3_3_1.min.js') }}"></</script>
        <script src="{{ asset('bootstrap_3_3_7/dist/js/bootstrap.js') }}"></script>
		@yield('css')
        @yield('script')
    </head>
    <body>
		<div id="wrapper">
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span> 
						</button>
						<a href="{{ url('/') }}"><img src="{{  asset('img/ACI logo.png') }}" width="50px" style="filter: brightness(0) invert(1)"></a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li><a href="{{ url('/home') }}">Home</a></li>
							@auth
							    @if(Auth::user()->email == 'lidia@gmail.com')
							        <li><a href="{{ url('/master_hobbies/') }}">Manage Hobby</a></li>
							        <li><a href="{{ url('/candidate_users/') }}">Manage Candidate</a></li>
							        <li><a href="{{ url('/schedules/') }}">Manage Schedule</a></li>
							    @endif
							@else
							    <li><a href="{{ url('/candidate_users/create') }}">Form Pendaftaran</a></li>
							@endauth
							<li><a href="{{ url('about') }}">Tentang Kami</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li>       
								@auth
									<a class = "header-button" href="{{ route('home') }}"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</a>
								@endauth
							</li>
							              
							@auth
								<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
									<span class="glyphicon glyphicon-log-in"></span> Logout
								</a></li>
								<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							@else
								<li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
							@endauth
						</ul>
					</div>
				</div>
			</nav>
            <div id="content">
                @include('flash-message')
				@yield('content')
            </div>
            
			
        </div>
		<nav class="navbar-wrapper navbar-inverse">
			<div class="container-fluid">
				<p class="navbar-text pull-left">&copy; ACI 2019</p>
			</div>
		</nav>
    </body>
</html>
