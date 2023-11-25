@extends('layouts.master')
@section('title') User Page @endsection
@section('content')
	<!-- bagian header -->
	<div class="row">
		<h2>Selamat Datang Bang {{ $user->name }} sebagai User</h2>
	</div>
@endsection