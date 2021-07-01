@extends('layouts.user_admin')
@section('title','Modificar contraseña')
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
              <li class="breadcrumb-item active">Modificar contraseña</li>
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
                    <h3 class="card-title">Modificar contraseña</h3>
                </div><!-- /.card-header -->
                {!! Form::model($user, ['route'=>['patient.update_password',$user],'method'=>'PUT']) !!}
                <div class="card-body">
                    <div class="tab-content">

                      <div class="form-group">
                        <label for="old_password">Contraseña actual</label>
                        <input type="password" id="old_password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" required autocomplete="new-password">

                        @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                      <div class="form-group">
                          <label for="password">Contraseña</label>
                          <input type="password" id="password" name="password" class="form-control    @error('password') is-invalid @enderror" required autocomplete="new-password">
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
@if (session('flash') == 'contrasenia')
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
            title: 'Tu contraseña se ha actualizado correctamente.'
        })
      });
</script>
@endif
@endsection
