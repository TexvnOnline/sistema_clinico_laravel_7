@extends('layouts.admin')
@section('title','Editar historia clínica')
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
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{route('users.show', $user)}}">{{$user->name}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('clinical.data.index', $user)}}">Historia Clínica</a></li>
              <li class="breadcrumb-item active">Historia clínica {{ $user->name }}</li>
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
            <div class="card card-primary">
                <div class="card-header p-2">
  
                  <h3 class="card-title">Actualiza los datos de historia clínica del usuario</h3>
                {{--  {!! Form::model($invoice, ['route'=>['back.patient.update.invoice',$user, $invoice],'method'=>'PUT']) !!}  --}}

                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="form-group">
                            <label for="check_in">Fecha de alta</label>
                            <input type="date" class="form-control @error('check_in') is-invalid @enderror" name="check_in" value="{{ $user->clinic_data('check_in', $datas) }}" id="check_in">
                            @error('check_in')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="scholarship">Escolaridad</label>
                            <input type="text" class="form-control @error('scholarship') is-invalid @enderror" name="scholarship" id="scholarship" value="{{ $user->clinic_data('scholarship', $datas) }}">
                            @error('scholarship')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
                <div class="card-footer text-muted">
                    <button type="button" class="btn btn-primary float-right">Actualizar</button>
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
@if (session('flash') == 'agendado')
<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            icon: 'warning',
            title: 'Su cita se encuentra en estado Pendiente.'
        })
      });
</script>
@endif
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
            title: 'La cita ha sido modificada correctamente.'
        })
      });
</script>
@endif

@endsection



