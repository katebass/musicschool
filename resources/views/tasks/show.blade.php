@extends('layout.master')

@section('title')
  Task
@endsection

@section('styles')
  <link rel="stylesheet" href="/css/content.css">
@endsection

@section('content')
	<div class="container">
		<div class="group-item">

		<h2>
			Title: {{ $task->title }}
		</h2>

		<hr>

		<h3>
			Description: {{ $task->description }}
		</h3>

		<p class="group-meta">
			<strong>Teacher: {{ $task->teacher->user->name }}</strong>
		</p>

		</div>
	</div>
	
@endsection