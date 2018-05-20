@extends('layout.master')

@section('title')
  Home
@endsection

@section('styles')
  <link rel="stylesheet" href="/css/content.css">
@endsection

@section('content')
	<div class="group-item">
		<h2 class="group-discipline">
			<a href="/groups/{{ $group->id }}">
			Discipline: {{ $group->discipline }}
			</a>
		</h2>
		
		<h3>
			{{ $group->description }}
		</h3>

		<p class="group-meta">
			<strong>Teacher: {{ $group->teacher->user->name }}</strong>
		</p>

		<p class="group-meta">
			<strong>Students: {{ $group->students->count() }}</strong>
		</p>
	</div>
	
@endsection