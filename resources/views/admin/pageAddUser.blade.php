@extends('layouts.master')
@section('title') Add User @endsection
@section('content')
<div class="row">
	@if (session('success'))
	    <div class="alert alert-success">
	        {{ session('success') }}
	    </div>
	@endif
	<form action="{{ route('admin.addUserDone') }}" method="POST">
	  @csrf
	  <div class="form-row">
	    <div class="form-group col-md-6">
	      <label for="name">Username</label>
	      <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? '' }}">
	      @error('name')
		    <div class="alert alert-danger">{{ $message }}</div>
		  @enderror
	    </div>
	    <div class="form-group col-md-6">
	      <label for="email">Email</label>
	      <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?? '' }}">
	      @error('email')
		    <div class="alert alert-danger">{{ $message }}</div>
		  @enderror
	    </div>
	  </div>
	  <button type="submit" class="btn btn-primary">Add User</button>
	  <a href="{{ route('admin.tampilUser') }}" type="button" class="btn btn-outline-secondary">back</a>
	</form>
</div>
@endsection