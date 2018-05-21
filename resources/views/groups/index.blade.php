@extends('layout.master')

@section('title')
  Home
@endsection

@section('styles')
  <link rel="stylesheet" href="/css/content.css">
@endsection

@section('content')
  <div class="header">
    <div class="blure"></div>
      <div class="container">
        <h1 class="banner-title">Kate Basova Music School</h1>
        <h4 class="banner-text">Welcome to the personal educational environment for the music school</h4>
    </div>
  </div>
  
  <form action="{{ route('search') }}" method="GET">
    <div class="form-group search-group">
      <label>Search by groups: </label>
      <input type="text" name="q" value="{{ isset($q)?$q:'' }}">
      <button type="submit">Submit</button>
    </div>
  </form>  

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