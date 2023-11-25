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
					<form method="POST" action="{{ route('register') }}" class="signin-form">
						@csrf
			      		<div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" id="email" placeholder="Enter email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" id="username"
                                placeholder="Enter username">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="userpassword">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="userpassword" placeholder="Enter password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" id="password_confirmation"
                                placeholder="Enter confirm password">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
			            <div class="form-group">
			            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
			            </div>
		          </form>
		          <p class="text-center">sudah memiliki Akun? <a data-toggle="tab" href="{{ url('login') }}">Sign In</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
@endsection