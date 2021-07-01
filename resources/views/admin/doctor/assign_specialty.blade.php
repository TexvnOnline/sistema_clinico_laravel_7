@extends('layouts.admin')
@section('title','Asignar especialidad')
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
              <li class="breadcrumb-item"><a href="{{route('users.show', $user)}}">{{$user->name}}</a></li>
              <li class="breadcrumb-item active">Asignar especialidad</li>
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
                  <h3 class="card-title">Asignar especialidades</h3>
                </div><!-- /.card-header -->
                {!! Form::model($user, ['route'=>['doctor.update_specialty',$user],'method'=>'PUT']) !!}
                <div class="card-body">
                  <div class="tab-content">
                    <div class="form-group">
                        @foreach ($specialties as $specialty)
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="{{$specialty->id}}" name="specialties[]" value="{{$specialty->id}}" 
                            @if ($user->has_speciality($specialty->id))
                            checked
                            @endif
                            >
                            <label for="{{$specialty->id}}" class="custom-control-label">{{$specialty->name}}</label>
                        </div>
                        @endforeach
                    </div>
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
                <div class="card-footer text-muted">
                    <button type="submit" class="btn btn-primary float-right">Asignar</button>
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
            title: 'Especialidades asignadas correctamente.'
        })
      });
</script>
@endif
@endsection



