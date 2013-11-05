{{-- app/views/header.blade.php --}}

@section("header")
	<header>
		<h1>BWH Radiology Template Search</h1>
		<nav id="top-nav">
			<ul>
				<li><a href="{{ url('search') }}">Search</a></li>
				<li><a href="{{ url('worklist') }}">Worklist</a></li>
				<li><a href="{{ url('profile') }}">Profile</a></li>
				@if (Auth::check())
				<li><a href="{{ url('logout') }}">Logout</a></li>
				@endif
			</ul>
		</nav>
	</header>
@show