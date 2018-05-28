@extends('layout.master')

@section('title')
	myGroups
@endsection

@section('styles')
	<link rel="stylesheet" href="/css/content.css">
@endsection

@section('content')

	<h3 class="section-title">MY GROUPS</h3>

	<div class="group-list">

		<div class="container">

			@if($user->isTeacher())
				<button class="btn btn-default">
					<a href="{{ route('creategroup') }}">Create group</a>
				</button>
			@endif

			@forelse($groups as $group)
				@include('groups.group')
			@empty
				no Groups
			@endforelse
		</div>

	</div>
  
  
@endsection