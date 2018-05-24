@extends('layout.master')

@section('title')
	mySolutions
@endsection

@section('styles')
	<link rel="stylesheet" href="/css/content.css">
@endsection

@section('content')

	<h3 class="section-title">MY SOLUTIONS</h3>

	<div class="group-list">

		<div class="container">

			@forelse($solutions as $solution)
				@include('solutions.solution')
			@empty
				No solutions to show
			@endforelse
		</div>

	</div>
  
  
@endsection