<li class="nav-item">
    <a class="nav-link {{ Route::is('home') ? 'active' : ''}}" href="{{ route('home') }}">
        <i class="nav-icon fas fa-tachometer-alt "></i>
        <p>
            Dashboard
        </p>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Route::is('dashboard') ? 'active' : ''}}" href="{{ route('dashboard') }}">
        <i class="nav-icon far fa-fw fa-file"></i>
        <p>
            Edit Blog
        </p>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Route::is('blog/create/post') ? 'active' : ''}}" href="{{ route('blog/create/post') }}">
        <i class="nav-icon far fa-fw fa-file"></i>
        <p>
            Create Blog
        </p>
    </a>
</li>



  <li class="nav-item">
    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="nav-icon fas fa-power-off"></i>
        <p>
            Log out
        </p>
    </a>
    <form id="logout-form" action="/logout" method="POST" style="display: none;">
      
        {{ csrf_field() }}

    </form>
  </li>