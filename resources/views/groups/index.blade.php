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
        <h1 class="blog-title">Kate Basova Music School</h1>
        <p class="lead blog-description">Welcome to the personal educational environment for the music school</p>
    </div>
  </div>

<div class="group-list">

<div class="container">
  @foreach($groups as $group)
    @include('groups.group')
  @endforeach
</div>


  <nav class="blog-pagination">
    <a class="btn btn-outline-primary" href="#">Older</a>
    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
  </nav>

</div>
  
  
@endsection