@extends('layout.master')

@section('title')
	Sign Up
@endsection

@section('content')
	<div class="container">
	
		<form action="{{ route('register') }}" method="POST" class="form-horizontal">
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
				<label for="">password</label>
				<input type="password" name="password" class="form-control col-sm-5">
			</div>

			<div class="form-group">
				<label for="">Confirm your password</label>
				<input type="password" name="password_confirmation" class="form-control col-sm-5">
			</div>

			<div class="form-group row">
				<label for="isteacher" class="col-sm-2">Teacher</label>
				<input type="radio" id="isteacher" name="status" class="form-control col-sm-2">
			</div>

			<div class="form-group row">
				<label for="isstudent" class="col-sm-2">Student</label>
				<input type="radio" id="isstudent" name="status" class="form-control col-sm-2" checked>
			</div>

			<div class="form-group">
				
			<button type="submit" class="btn btn-default " class="form-control col-sm-5">Submit</button>
			</div>
		</form>

	</div>

@endsection