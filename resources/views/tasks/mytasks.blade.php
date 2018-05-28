@extends('layout.master')

@section('title')
	MyTasks
@endsection

@section('styles')
	<link rel="stylesheet" href="/css/content.css">
@endsection

@section('content')

	<h3 class="section-title">MY TASKS</h3>

	<div class="group-list">

		<div class="container">

			@if($user->isTeacher())
				<button class="btn btn-default">
					<a href="{{ route('createtask') }}">Create task</a>
				</button>
			@endif

			@forelse($tasks as $task)
				@include('tasks.task')
			@empty
				no tasks yet...
			@endforelse
		</div>

	</div>
  
  
@endsection