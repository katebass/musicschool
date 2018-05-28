@extends('layout.master')

@section('title')
	Home
@endsection

@section('styles')
	<link rel="stylesheet" href="/css/content.css">
@endsection

@section('content')
	<div class="header">
		<div class="blure">
		</div>
			<div class="container">
				<h1 class="blog-title">Kate Basova Music School</h1>
				<p class="lead blog-description">Welcome to the personal educational environment for the music school</p>
		</div>
	</div>

	<form action="{{ route('sendfile') }}" method="POST" enctype="multipart/form-data" files="true">
		{{ csrf_field() }}

		<input type="file" name="myfile">

		<input type="submit">
	</form>
	
	
@endsection