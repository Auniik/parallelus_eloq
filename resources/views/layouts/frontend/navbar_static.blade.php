<?php
	$config=App\Configuration::first();
	$url = Request::path();
?>
<div class="header-inner menu-container">
	<div class="navbar-wrapper">
		<nav class="navbar navbar-default navbar-fixed-top" id="nav-main">
			<div class="container-fluid">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="{{url('/')}}" class="navbar-brand">{{$config==null ? 'Your Name' : $config->profile_name}}</a>
				</div>

				<div class="collapse navbar-collapse" id="navbar-main">
					<ul class="nav navbar-nav" id="nav-left">
						<li><a href="{{url('/')}}">Home</a></li>
						<li ><a href="{{url('/issues')}}">Issues</a></li>
						<li class="dropdown show-on-hover">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">News</a>
							<ul class="dropdown-menu">
								<li class="{{ $url  == 'news' ? 'active' : '' }}"><a href="{{url('/news')}}">News</a></li>
								<li class="{{ $url  == 'videos' ? 'active' : '' }}"><a href="{{url('/videos')}}">Videos</a></li>
								<li class="{{ $url  == 'events' ? 'active' : '' }}"><a href="{{url('/events')}}">Events</a></li>
							</ul>
						</li>
						<li class="dropdown show-on-hover">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">About</a>
							<ul class="dropdown-menu">
								<li><a href="{{url('/about')}}">About {{$config==null ? '*Your name*' : $config->profile_name}}</a></li>
								<li><a href="{{url('/features')}}">Features</a></li>
							</ul>
						</li>
						<li class="{{ $url  == 'contact' ? 'active' : '' }}"><a href="{{url('/contact')}}">Contact</a></li>
					</ul>
					{{-- <ul class="nav navbar-nav" id="nav-right">
						<li><a href="{{url('/donate')}}">Donate</a></li>
					</ul> --}}
				</div>
			</div>
		</nav>  <!-- end default nav -->
	</div>  <!-- end navbar-wrapper -->
</div>  <!-- end header-inner -->