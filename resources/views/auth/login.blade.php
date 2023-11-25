@extends('layouts.master-without-nav')
@section('title') Form User Management @endsection
@section('content')
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(assets/images/bg.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
			      	</div>
					<form method="POST" action="{{ route('login') }}" class="signin-form">
						@csrf
			      		<div class="form-group mb-3">
			      			<label class="form-label" for="email">Email</label>
			      			<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email"placeholder="Enter Email Address">
			      			@error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
			      		</div>
			            <div class="form-group mb-3">
			            	<label class="form-label" for="password">Password</label>
			              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="userpassword" placeholder="Password">
			              @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
			            </div>
			            <div class="form-group">
			            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
			            </div>
			            <div class="form-group d-md-flex">
			            	<div class="w-50 text-left">
					            <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
								  <input type="checkbox" class="form-check-input" id="auth-remember-check"
                                            name="remember" {{ old('remember') ? 'checked' : '' }}>
								  <span class="checkmark"></span>
								</label>
							</div>
			            </div>
		          </form>
		          <p class="text-center">Belum memiliki Akun? <a data-toggle="tab" href="{{ url('register') }}">Sign Up</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
@endsection