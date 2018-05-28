@extends('layout.master')

@section('title')
	NewSolution
@endsection

@section('styles')
	<link rel="stylesheet" href="/css/content.css">
@endsection

@section('content')

	<div class="container">

		<form action="{{ route('storesolution', $taskid) }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="form-group">
				@include('layout.errors')
			</div>
			
			<div class="formgroup">
				<label for="">Audiofile:</label>
				<input type="file" name="audiofile">
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