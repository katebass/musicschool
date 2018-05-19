@extends('layout.master')

@section('title')
	Sign Up
@endsection

@section('content')
	<form action="{{ route('register') }}" method="POST">
		{{ csrf_field() }}

		<p>Registration</p>

		<label for="">Name</label>
		<input type="text" name="name">

		<label for="">Address</label>
		<input type="text" name="address">

		<label for="">Phone</label>
		<input type="text" name="phone">

		<label for="">Email</label>
		<input type="text" name="email">

		<label for="">password</label>
		<input type="password" name="password">

		<label for="">Confirm your password</label>
		<input type="password" name="password_confirmation">
		
		<label for="isteacher">Teacher</label>
		<input type="radio" id="isteacher" name="status">

		<label for="isstudent">Student</label>
		<input type="radio" id="isstudent" name="status" checked>

		<button type="submit">Submit</button>
	</form>
@endsection