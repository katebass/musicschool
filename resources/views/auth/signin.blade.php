@extends('layout.master')

@section('title')
	Sign Up
@endsection

@section('content')
	<form action="{{ route('login') }}" method="POST">
		{{ csrf_field() }}

		<p>Signing in</p>
		<label for="">Email</label>
		<input type="text" name="email">

		<label for="">password</label>
		<input type="password" name="password">

		<button type="submit">Submit</button>
	</form>
@endsection