@extends('layout.master')

@section('title')
	Sign Up
@endsection

@section('content')
	<div class="container">
	
		<form action="{{ route('register') }}" method="POST">
			{{ csrf_field() }}

			<h2>Registration</h2>

			<div class="form-group">
				@include('layout.errors')
			</div>
			
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control col-sm-5">
			</div>

			<div class="form-group">
				<label for="">Address</label>
				<input type="text" name="address" class="form-control col-sm-5">
			</div>

			<div class="form-group">
				<label for="">Phone</label>
				<input type="text" name="phone" class="form-control col-sm-5">
			</div>

			<div class="form-group">
				<label for="">Email</label>
				<input type="text" name="email" class="form-control col-sm-5">
			</div>

			<div class="form-group">
				<label for="">Password</label>
				<input type="password" name="password" class="form-control col-sm-5">
			</div>

			<div class="form-group">
				<label for="">Confirm your password</label>
				<input type="password" name="password_confirmation" class="form-control col-sm-5">
			</div>

			<div class="form-group row">
				<label for="isstudent" class="col-sm-1">Student</label>
				<input type="radio" id="isstudent" name="role" class="form-control col-sm-2 radio" value="student" checked>
			</div>

			<div class="form-group row">
				<label for="isteacher" class="col-sm-1">Teacher</label>
				<input type="radio" id="isteacher" name="role" class="form-control col-sm-2 radio" value="teacher">
			</div>

			<div class="form-group" id="grade">
				<label for="">Grade (1-5)</label>
				<input type="text" name="grade" class="form-control col-sm-5">
			</div>

			<div class="form-group display-no" id="experience">
				<label for="">Experience</label>
				<input type="text" name="experience" class="form-control col-sm-5">
			</div>


			<div class="form-group">
				<button type="submit" class="btn btn-default " class="form-control col-sm-5">Submit</button>
			</div>
		</form>

	</div>

@endsection