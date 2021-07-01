@extends('layouts.admin')
@section('title','Perfil de usuario')
@section('style')
<!-- SweetAlert2 -->
{!! Html::style('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') !!}
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perfil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
              <li class="breadcrumb-item active">{{$user->name}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            @include('includes._profile')
            <!-- /.card -->
            <!-- About Me Box -->
            @include('admin.users._nav')
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <h3 class="card-title">Perfil de usuario</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="form-row">
                    <div class="col-md-8">
                      <strong><i class="fas fa-book mr-1"></i> Nombre</strong>
                      <p class="text-muted">
                        {{$user->name}}
                      </p>
                      <hr>
                      <strong><i class="far fa-file-alt mr-1"></i> Apellidos</strong>
                      <p class="text-muted">
                        {{$user->profile->surnames}}
                      </p>
                      <hr>
                      <strong><i class="fas fa-pencil-alt mr-1"></i> Fecha de nacimiento</strong>
                      <p class="text-muted">
                        {{$user->profile->birthdate->format('l jS \\of F Y')}}
                      </p>
                      <hr>
                      <strong><i class="fas fa-pencil-alt mr-1"></i> Edad</strong>
                      <p class="text-muted">
                        {{$user->age()}}
                      </p>
                      <hr>
                      <strong><i class="fas fa-map-marker-alt mr-1"></i> Correo electrónico</strong>
                      <p class="text-muted">
                        {{$user->email}}
                      </p>
                      <hr>
                      <strong><i class="fas fa-map-marker-alt mr-1"></i> Miembro desde</strong>
                      <p class="text-muted">
                        {{$user->created_at->diffForHumans()}}
                      </p>
                    </div>
                    <div class="col-md-4">
                      <strong><i class="far fa-file-alt mr-1"></i> Fotografía de perfil</strong>
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle"
                               src="{{$user->profile->image->url}}"
                               alt="{{$user->name}}">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <a href="{{route('user.edit_profile', $user)}}" class="btn btn-primary float-right">Actualizar</a>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
@section('script')
<!-- SweetAlert2 -->
{!! Html::script('adminlte/plugins/sweetalert2/sweetalert2.min.js') !!}
@if (session('flash') == 'actualizado')
<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            icon: 'success',
            title: 'Usuario actualizado correctamente.'
        })
      });
</script>
@endif
@endsection



