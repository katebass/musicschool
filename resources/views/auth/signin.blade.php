@extends('layout.master')

@section('title')
	Sign In
@endsection

@section('content')
<div class="container">
	
	<form action="{{ route('login') }}" method="POST">
		{{ csrf_field() }}

		<h2>Signing in</h2>
		
		<div class="form-group">
			@include('layout.errors')
		</div>

		<div class="form-group">
			<label for="email">Email Adress:</label>
			<input type="email" class="form-control col-sm-5" id="email" name="email" required>	
		</div>

		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" class="form-control col-sm-5" id="password" name="password" required>	
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-default">Sign in</button>
		</div>
	</form>

</div>
@endsection