@extends('layouts.master')
@section('title') List User @endsection
@section('content')
		<!-- bagian header -->
		<div class="row">
			@if (session('success'))
			    <div class="alert alert-success">
			        {{ session('success') }}
			    </div>
			@endif
			<a href="{{ route('admin.addUser') }}" type="button" class="btn btn-success col-md-2 mb-1">Add User</a>
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Username</th>
			      <th scope="col">Email</th>
			      <th scope="col">User since</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@php
                    $i = 1;
                @endphp
			  	@foreach($user as $user)
			    <tr>
			      <th scope="row">{{ $i++ }}</th>
			      <td>{{ $user->name }}</td>
			      <td>{{ $user->email }}</td>
			      <td>{{ $user->created_at }}</td>
			      <td>
			      	<form action="{{ route('admin.deleteUser', $user->id_user) }}" class="d-inline" method="POST">@csrf<button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button></form>
			      </td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>
		</div>
@endsection