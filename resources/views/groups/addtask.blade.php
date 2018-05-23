@extends('layout.master')

@section('title')
	AddTask
@endsection

@section('styles')
	<link rel="stylesheet" href="/css/content.css">
@endsection

@section('content')

	<h3 class="section-title">ADD TASK TO THE GROUP</h3>

	<div class="container">
		<form action="{{ route('addtaskpost', $id) }}" method="POST">
			{{ csrf_field() }}
			
			<h2>Adding a task</h2>

			<div class="form-group">
				@include('layout.errors')
			</div>

			<div class="form-group">
				<label for="">Task: </label>
				<select name="taskid" required">

					@forelse($tasks as $task)
						<option value="{{ $task->id }}">{{ $task->title }}</option>
					@empty
						<option value="">You have no tasks to add... (Create task)</option>
					@endforelse
				</select>
			</div>

			<div class="form-group">
				<label for="">Set deadline: </label>
				<input type="datetime-local" name="deadline">
			</div>


			<div class="formgroup">
				<button type="submit">Add task</button>
			</div>
		</form>
	</div>
  
@endsection