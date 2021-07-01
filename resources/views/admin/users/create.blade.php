@extends('layouts.admin')
@section('title','Registrar usuario')
@section('style')
    
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{--  <h1>Agregar usuario</h1>  --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
              <li class="breadcrumb-item active">Agregar usuario</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        {!! Form::open(['route'=>'users.store', 'method'=>'POST']) !!} 
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">General</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email"  value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="role">Rol</label>
                <select id="role" name="role" class="form-control custom-select @error('role') is-invalid @enderror">
                  <option selected disabled>Selecciona un rol</option>
                  @foreach ($roles as $role)
                  <option 
                  value="{{$role->name}}"
                  {{ old('role', $role->name) == $role->name ? 'selected' : '' }}
                  >{{$role->name}}</option>
                  @endforeach
                </select>
                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password-confirm">Confirmar contraseña</label>
                <input type="password" id="password-confirm" name="password_confirmation" class="form-control" required autocomplete="new-password">
              </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="row">
            <div class="col-12 mb-2">
            <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Registrar" class="btn btn-primary float-right">
            </div>
        </div>
        {!! Form::close() !!}
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('script')
    
@endsection