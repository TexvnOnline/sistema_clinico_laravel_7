@extends('layouts.user_admin')
@section('title','Mis recetas')
@section('style')
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
              <li class="breadcrumb-item"><a href="{{route('patient.index')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Mis recetas</li>
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

                <h3 class="card-title">Mis recetas</h3>

              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Especialista</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($recipes as $recipe)
                              <tr>
                                <td>{{$recipe->id}}</td>
                                  <td>{{$recipe->doctor($recipe)->name}} {{$recipe->doctor($recipe)->profile->surnames}} </td>
                                  <td>{{$recipe->created_at->format('d/m/Y')}}</td>
                                  <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="{{route('patient.prescription_details',$recipe)}}">
                                      <i class="far fa-eye"></i>
                                      Ver
                                    </a>
                                  </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>One fine body&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Imprimir</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection
@section('script')

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
