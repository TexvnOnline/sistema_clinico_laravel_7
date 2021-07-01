@extends('layouts.admin')
@section('title','Historia clínica de '. $user->name)
@section('style')
<!-- SweetAlert2 -->
{!! Html::style('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') !!}
<!-- DataTables -->
{!! Html::style('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}
{!! Html::style('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}
{!! Html::style('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') !!} 
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
              <li class="breadcrumb-item active">Historia clínica</li>
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
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Historia clínica {{$user->name}}</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Agregar notas de evolución</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Notas de evolución</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <strong><i class="fas fa-book mr-1"></i> Fecha de alta</strong>
                        <p class="text-muted">
                            {{ carbon_format($user->clinic_data('check_in', $datas), 'd/m/Y') }}
                        </p>
                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Escolaridad</strong>
                        <p class="text-muted">{{ $user->clinic_data('scholarship', $datas) }}</p>
                        <hr>
                        <div class="form-group">
                          <a href="{{route('clinical.data.create', $user)}}" class="btn btn-primary float-right">Actualizar</a>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                        
                      {!! Form::open(['route'=>['clinic.note.store', $user], 'method'=>'POST']) !!}
                        
                        <div class="form-group">
                          <label for="description">Escribe la nota médica aquí</label>
                          <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                          <label for="privacy">Selecciona la opción de privacidad</label>
                          <select class="form-control" name="privacy" id="privacy" required>
                            <option value="public">Pública</option>
                            <option value="private">Privada</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                      {!! Form::close() !!}
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="settings">
                        <div class="card-body table-responsive">
                            <table id="example2" class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th width="90%">Notas</th>
                                        <th width="10%">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($clinic_notes as $clinicNote)
                                    <tr>
                                        <td>
                                            <p>Creado por <b>{{ $clinicNote->creator->name }}</b> el <b>{{ carbon_format($clinicNote->date, 'd/m/Y') }}</b> a las <b>{{ carbon_format($clinicNote->date, 'H:i') }}</b></p>
                                            <b>Descripción: </b> {!! $clinicNote->description !!}
                                        </td>
                                        <td>
                                            <p>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg{{$clinicNote->id}}">
                                                    Editar
                                                </button>
                                            </p>
                                        </td>
                                    </tr>
                                    <!-- /.modal -->
                                    <div class="modal fade" id="modal-lg{{$clinicNote->id}}">
                                        <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Editar nota</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            {!! Form::model($clinicNote, ['route'=>['clinic.note.update',$user, $clinicNote],'method'=>'PUT']) !!}

                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="description">Escribe la nota médica aquí</label>
                                                    <textarea class="form-control" name="description" id="description" rows="3" required>
                                                        {{$clinicNote->description}}
                                                    </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="privacy">Selecciona la opción de privacidad</label>
                                                    <select class="form-control" name="privacy" id="privacy" required>
                                                      <option value="public"
                                                      @if ($clinicNote->privacy == 'public')
                                                        selected
                                                      @endif
                                                      >Pública</option>
                                                      <option value="private"
                                                      @if ($clinicNote->privacy == 'private')
                                                        selected 
                                                      @endif
                                                      >Privada</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                        <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>        
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
@if (session('flash') == 'registrado_actualizado')
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
            title: 'Historia clínica actualizada con éxito.'
        })
      });
</script>
@endif
@if (session('flash') == 'nota_registrada')
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
            title: 'Nota de evolución registrada.'
        })
      });
</script>
@endif
@if (session('flash') == 'nota_actualizada')
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
            title: 'La nota de evolución fue actualizada.'
        })
      });
</script>
@endif
<!-- DataTables  & Plugins -->
{!! Html::script('adminlte/plugins/datatables/jquery.dataTables.min.js') !!}
{!! Html::script('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') !!}
{!! Html::script('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') !!}
{!! Html::script('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') !!}
{!! Html::script('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') !!}
{!! Html::script('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') !!}
{!! Html::script('adminlte/plugins/jszip/jszip.min.js') !!}
{!! Html::script('adminlte/plugins/pdfmake/pdfmake.min.js') !!}
{!! Html::script('adminlte/plugins/pdfmake/vfs_fonts.js') !!}
{!! Html::script('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') !!}
{!! Html::script('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') !!}
{!! Html::script('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') !!}
@include('includes._datatable_language')
@endsection



