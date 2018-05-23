@extends('layout.master')

@section('title')
  NewTask
@endsection

@section('styles')
  <link rel="stylesheet" href="/css/content.css">
@endsection

@section('content')

	<div class="container">

		<form action="{{ route('storegroup') }}" method="POST">
			{{ csrf_field() }}

			<div class="form-group">
				@include('layout.errors')
			</div>
			
			<div class="formgroup">
				<label for="">Discipline: </label>
				<input type="text" name="discipline">
			</div>

			<div class="formgroup">
				<label for="">Description:</label>
				<input type="text" name="description">
			</div>

			<div class="formgroup">
				<button type="submit">Create</button>
			</div>

		</form>

		
	</div>
	
@endsection