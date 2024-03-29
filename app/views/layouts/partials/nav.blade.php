<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('home') }}">Cuitter</a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ URL::route('users_path') }}">Browse Users</a></li>
        <li><a href="#">Link</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        @if ($currentUser)
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img class="nav-gravatar" src="{{ $currentUser->present()->gravatar }}" alt="{{ $currentUser->username }}">
            {{ $currentUser->username }} <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('profile_path', 'Your Profile', $currentUser->username) }}</li>
            <li><a href="#">Another action</a></li>
            <li class="divider"></li>
            <li>{{ link_to_route('logout_path', 'Logout') }}</li>
          </ul>
        </li>
        @else
          <li><a href="{{ URL::route('register_path') }}">Register</a></li>
          <li><a href="{{ URL::route('login_path') }}">Log In</a></li>
        @endif
      </ul>

    </div>
  </div>
</nav>