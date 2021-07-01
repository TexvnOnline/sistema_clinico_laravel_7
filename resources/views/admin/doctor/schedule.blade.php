@extends('layouts.admin')
@section('title','Gestión de horarios')
@section('style')
<!-- SweetAlert2 -->
{!! Html::style('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') !!}
<!-- Select2 -->
{!! Html::style('adminlte/plugins/select2/css/select2.min.css') !!}
{!! Html::style('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') !!}
{!! Html::style('multiple_dates_picker/jquery-ui.multidatespicker.css') !!}
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
              <li class="breadcrumb-item active">Gestión de horarios</li>
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
                  <h3 class="card-title">Establece los horarios para el médico</h3>
                </div><!-- /.card-header -->
                {!! Form::open(['route'=>['doctor.schedule.assignment', $user], 'method'=>'POST']) !!}
                <div class="card-body">
                    <div class="tab-content">
                        <div class="form-group">
                          <label for="multi_date_input">Días de asueto</label>
                          <input
                          class="form-control" 
                            id="multi_date_input" 
                            name="multi_date_input" 
                            readonly="" 
                            placeholder="Seleccione los días de asueto y vacaciones" 
                            id="days_off" 
                            type="text" 
                          >
                        </div>
                    </div>
                    <div class="form-group">

                      <label for="week_days_off">Días no laborables</label>

                      <select name="week_days_off[]" id="week_days_off" class="select2 @error('role') is-invalid @enderror" multiple="multiple" data-placeholder="Selecciona los días no laborables" style="width: 100%;">
                        
                        <option value="1">Domingo</option>
                        <option value="2">Lunes</option>
                        <option value="3">Martes</option>
                        <option value="4">Miércoles</option>
                        <option value="5">Jueves</option>
                        <option value="6">Viernes</option>
                        <option value="7">Sábado</option>
                      </select>

                    </div>

                    @foreach($days as $key => $day)
                        <div class="row">
                            <div class="col s2">
                                <p>{{ $day }}</p>
                            </div>
                            <div class="col s2">
                                <input id="{{ $key }}-turn_a_in" class="form-control" type="time" name="{{ $key }}-turn_a_in">
                                <label for="{{ $key }}-turn_a_in">Turno A Entrada</label>
                            </div>
                            <div class="col s2">
                                <input id="{{ $key }}-turn_a_out" class="form-control" type="time" name="{{ $key }}-turn_a_out">
                                <label for="{{ $key }}-turn_a_out">Turno A Salida</label>
                            </div>
                            <div class="col s2">
                                <input id="{{ $key }}-turn_b_in" class="form-control" type="time" name="{{ $key }}-turn_b_in">
                                <label for="{{ $key }}-turn_b_in">Turno B Entrada</label>
                            </div>
                            <div class="col s2">
                                <input id="{{ $key }}-turn_b_out" class="form-control" type="time" name="{{ $key }}-turn_b_out">
                                <label for="{{ $key }}-turn_b_out">Turno B Salida</label>
                            </div>
                        </div>
                    @endforeach
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
                <div class="card-footer text-muted">
                    <button type="submit" class="btn btn-primary float-right">Guardar</button>
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
            title: 'Horario actualizado correctamente.'
        })
      });
</script>
@endif
<!-- Select2 -->
{!! Html::script('adminlte/plugins/select2/js/select2.full.min.js') !!}
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })
      })
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
{!! Html::script('multiple_dates_picker/jquery-ui.multidatespicker.js') !!}
<script type="text/javascript">
    $('#multi_date_input').multiDatesPicker({
        dateFormat: "yy/m/d",
    });
</script>

@endsection



