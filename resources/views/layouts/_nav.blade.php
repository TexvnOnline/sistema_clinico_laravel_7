<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{!!asset('adminlte/dist/img/AdminLTELogo.png')!!}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Texvn Online</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{Auth::user()->profile->image->url}}" class="img-circle elevation-2" alt="{{Auth::user()->name}}">
        </div>
        <div class="info">
          <a href="{{route('users.show', Auth::user())}}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link 
              {!! active_class(route('users.index')) !!}
              ">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Usuarios
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('specialties.index')}}" class="nav-link 
              {!! active_class(route('specialties.index')) !!}
              ">
                <i class="nav-icon fas fa-user-tag"></i>
                <p>
                  Especialidades
                </p>
            </a>
          </li>

          @if (auth()->user()->hasRole('Doctor'))
          <li class="nav-item">
            <a href="{{route('doctor.appointments', auth()->user())}}" class="nav-link 
            {!! active_class(route('doctor.appointments', auth()->user())) !!}
            ">
              <i class="nav-icon far fa-calendar-check"></i>
              <p>
                Mis citas
              </p>
            </a>
          </li> 
          @else
          <li class="nav-item">
            <a href="{{route('all.appointments')}}" class="nav-link 
            {!! active_class(route('all.appointments')) !!}
            ">
              <i class="nav-icon far fa-calendar-check"></i>
              <p>
                Citas programadas
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>