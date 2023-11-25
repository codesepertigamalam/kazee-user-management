<div class="container">
		<!-- bagian navbar -->
		<div class="row">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <a class="navbar-brand" href="#">
			    <img src="{{ asset('assets/images/logo sepertigamalam.png') }}" width="40" height="40" alt="">
			  </a>
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item">
			       @if(auth()->user()->type === 'user')
			        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard <span class="sr-only">(current)</span></a>
		          	@else
		            <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard <span class="sr-only">(current)</span></a>
		          @endif
			      </li>
			      <li class="nav-item">
			      @if(auth()->user()->type === 'user')
			        <a class="nav-link" href="{{ route('tampilProfile') }}">Edit Profile</a>
		          	@else
		            <a class="nav-link" href="{{ route('admin.tampilProfile') }}">Edit Profile</a>
		          @endif
		         </li>
		         <li class="nav-item">
			      @if(auth()->user()->type === 'user')
			      	<a class="nav-link" href="{{ route('tampilPassword') }}">Edit Password</a>
		          	@else
		          	<a class="nav-link" href="{{ route('admin.tampilPassword') }}">Edit Password</a>
		          @endif
		      	  </li>
		      	  <li class="nav-item">
		          @if(auth()->user()->type === 'admin')
		          	<a class="nav-link" href="{{ route('admin.tampilUser') }}">List User</a>
		          @endif
			      </li>
			    </ul>
			    @if(Auth::check())
			    <form action="{{ route('logout') }}" method="POST">
			        @csrf
			        <button type="submit" class="btn btn-outline-danger">Logout</button>
			    </form>
				@endif
			  </div>
			</nav>
		</div>
	</div>