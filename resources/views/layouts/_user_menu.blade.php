<li class="nav-item dropdown user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
      <img src="{{Auth::user()->profile->image->url}}" class="user-image img-circle elevation-2" alt="User Image">
      <span class="d-none d-md-inline">{{Auth::user()->name}}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <!-- User image -->
      <li class="user-header bg-primary">
        <img src="{{Auth::user()->profile->image->url}}" class="img-circle elevation-2" alt="User Image">

        <p>
          {{Auth::user()->name}} {{Auth::user()->profile->surnames}}
          <small>{{Auth::user()->created_at->diffForHumans()}}</small>
        </p>
      </li>
      <!-- Menu Body -->
      {{--  <li class="user-body">
        <div class="row">
          <div class="col-4 text-center">
            <a href="#">Followers</a>
          </div>
          <div class="col-4 text-center">
            <a href="#">Sales</a>
          </div>
          <div class="col-4 text-center">
            <a href="#">Friends</a>
          </div>
        </div>
        <!-- /.row -->
      </li>  --}}
      <!-- Menu Footer-->
      <li class="user-footer">
        <a 
        @if (Auth::user()->hasRole('Patient'))
        href="{{route('patient.index')}}"
        @else
        href="{{route('users.show', Auth::user())}}"
        @endif
        class="btn btn-default btn-flat">Perfil</a>
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" class="btn btn-default btn-flat float-right">Cerrar sesión</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
    </ul>
</li>