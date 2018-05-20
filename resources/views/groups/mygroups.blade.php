@extends('layout.master')

@section('title')
  myGroups
@endsection

@section('styles')
  <link rel="stylesheet" href="/css/content.css">
@endsection

@section('content')

  <h3>MY GROUPS</h3>

<div class="group-list">

<div class="container">
  @forelse($groups as $group)
    @include('groups.group')
  @empty
  no Groups
  @endforelse
</div>

</div>
  
  
@endsection