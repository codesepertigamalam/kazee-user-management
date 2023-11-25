@extends('layouts.master')
@section('title') Edit Password @endsection
@section('content')
	<div class="row">
		@if (session('success'))
		    <div class="alert alert-success">
		        {{ session('success') }}
		    </div>
		@endif
		<form action="{{ route('admin.updatePassword') }}" method="POST">
			@csrf
			<div class="form-row">
				<div class="form-group col-md-12">
			      <label for="current_password">Current Password</label>
			      <input id="current_password" type="password" class="form-control" name="current_password">
			      @error('current_password')
				    <div class="alert alert-danger">{{ $message }}</div>
				  @enderror
			    </div>

			    <div class="form-group col-md-12">
			      <label for="new_password">New Password</label>
			      <input id="new_password" type="password" class="form-control" name="new_password">
			      @error('new_password')
				    <div class="alert alert-danger">{{ $message }}</div>
				  @enderror
			    </div>

			    <div class="form-group col-md-12">
			      <label for="new_password_confirmation">Current Password</label>
			      <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation">
			      @error('new_password_confirmation')
				    <div class="alert alert-danger">{{ $message }}</div>
				  @enderror
			    </div>
	        </div>
	        <button type="submit" class="btn btn-primary">Update</button>
			<a href="{{ route('dashboard') }}" type="button" class="btn btn-outline-secondary">back</a>
		</form>
	</div>
@endsection