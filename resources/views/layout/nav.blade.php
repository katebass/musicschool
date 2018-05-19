<div class="navigation">
  <div class="container">
    <nav class="nav blog-nav">
      <a class="nav-link active" href="{{ route('home') }}">Home</a>
      <a class="nav-link" href="#">My Groups</a>
      <a class="nav-link" href="#">Tasks</a>
      <a class="nav-link" href="#">Solutions</a>
      
      @if(Auth::check())
      <a class="nav-link ml-auto" href="#">Hello, {{ Auth::user()->name }}!</a>
      <a class="nav-link ml-auto" href="{{ route('logout') }}">Logout</a>
      @else
      <a class="nav-link ml-auto" href="{{ route('signup') }}">Sign up</a>
      <a class="nav-link ml-auto" href="{{ route('login') }}">Login</a>
      @endif
    </nav>
  </div>
</div>