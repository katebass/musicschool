@extends('layout.master')

@section('title')
	myTasks
@endsection

@section('styles')
	<link rel="stylesheet" href="/css/content.css">
@endsection

@section('content')

	<h3 class="section-title">MY TASKS</h3>

	<div class="group-list">

		<div class="container">

			@if($user->isTeacher())
				<a href="{{ route('creategroup') }}">Create task</a>
			@endif

			@forelse($tasks as $task)
				@include('tasks.task')
			@empty
				no tasks yet...
			@endforelse
		</div>

	</div>
  
  
@endsection