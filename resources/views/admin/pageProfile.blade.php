@extends('layouts.master')
@section('title') Edit Profile @endsection
@section('content')
		<!-- bagian header -->
		<div class="row">
			@if (session('success'))
			    <div class="alert alert-success">
			        {{ session('success') }}
			    </div>
			@endif
			<form action="{{ route('admin.updateProfile') }}" method="POST">
			  @csrf
			  <input type="hidden" class="form-control" id="name" name="id_user" value="{{ $user->id_user}}">
			  <input type="hidden" class="form-control" id="name" name="id_profile" value="{{ $profile->id_profile ?? ''}}">
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="name">Username</label>
			      <input type="text" class="form-control" id="name" name="name" value="{{ $user->name}}">
			      @error('name')
				    <div class="alert alert-danger">{{ $message }}</div>
				  @enderror
			    </div>
			    <div class="form-group col-md-6">
			      <label for="email">Email</label>
			      <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
			    </div>
			    <div class="form-group col-md-6">
			      <label for="location">Location</label>
			      <input type="text" class="form-control" id="location" name="location" placeholder="Input Location" value="{{ $profile->location ?? ''}}">
			      @error('location')
				    <div class="alert alert-danger">{{ $message }}</div>
				  @enderror
			    </div>
			    <div class="form-group col-md-6">
			      <label for="phone">Phone</label>
			      <input type="tel" pattern="[0-9]*" class="form-control" id="phone" name="phone" placeholder="Input Phone Number" value="{{ $profile->phone ?? ''}}">
			      @error('phone')
				    <div class="alert alert-danger">{{ $message }}</div>
				  @enderror
			    </div>
			    <div class="form-group col-md-12">
				    <label for="about">About Me</label>
				    <textarea class="form-control" id="about" rows="5" name="about">{{ $profile->about ?? ''}}</textarea>
			    </div>
			  </div>
			  <button type="submit" class="btn btn-primary">Update</button>
			  <a href="{{ route('admin.dashboard') }}" type="button" class="btn btn-outline-secondary">back</a>
			</form>
		</div>
@endsection