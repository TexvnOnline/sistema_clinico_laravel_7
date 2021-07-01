@extends('layouts.user_admin')
@section('title','Edición de perfil')
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
              <li class="breadcrumb-item"><a href="{{route('patient.index')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Editar perfil</li>
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
            @include('patient._nav')
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header p-2">
                    <h3 class="card-title">Edición de perfil</h3>
                </div><!-- /.card-header -->
                {!! Form::model($user, ['route'=>['patient.update_profile',$user],'method'=>'PUT','files' => true]) !!}
                <div class="card-body">
                    <div class="tab-content">

                        <div class="form-row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="name">Nombre</label>
                              <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="surnames">Apellidos</label>
                              <input type="text" id="surnames" name="surnames"
                              @if (isset($user->profile->surnames))
                              value="{{ old('surnames', $user->profile->surnames) }}"
                              @else
                              value="{{ old('surnames') }}" 
                              @endif
                              class="form-control @error('surnames') is-invalid @enderror" required>
                              @error('surnames')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" id="email" name="email"  value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-row">
                          <div class="col-md-6">
                          <div class="form-group">
                            <label for="birthdate">Fecha de nacimiento</label>
                            <input type="date" name="birthdate" id="birthdate"
                            @if (isset($user->profile->birthdate))
                              value="{{ old('birthdate', $user->profile->birthdate) }}"
                            @else
                              value="{{ old('birthdate') }}" 
                            @endif
                            class="form-control @error('birthdate') is-invalid @enderror" required>
                            @error('birthdate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Fotografía de perfil</label>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input @error('avatar') is-invalid @enderror" id="avatar" name="avatar" lang="es">
                                <label class="custom-file-label" for="avatar">Seleccionar Archivo</label>
                                @error('avatar')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->

                <div class="card-footer text-muted">
                    <button type="submit" class="btn btn-primary float-right">Actualizar</button>
                </div>
                {!! Form::close() !!}
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
            title: 'Perfil actualizado correctamente.'
        })
      });
</script>
@endif
@endsection
