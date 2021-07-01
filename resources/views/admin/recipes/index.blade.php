@extends('layouts.admin')
@section('title','Recetas de '. $user->name)
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
              <li class="breadcrumb-item active">Recetas</li>
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
  
                  <h3 class="card-title">Recetas de {{$user->name}}</h3>
  
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
                                      <th class="text-center">Acciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($recipes as $recipe)
                                <tr>
                                  <td>{{$recipe->id}}</td>
                                  <td>{{$recipe->doctor($recipe)->name}}</td>
                                  <td>{{$recipe->created_at->format('d/m/Y')}}</td>
                                  <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="{{route('recipes.show',[$user, $recipe])}}">
                                      <i class="far fa-eye"></i>
                                      Ver
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{route('recipes.edit',[$user, $recipe])}}">
                                      <i class="fas fa-pencil-alt">
                                      </i>
                                      Editar
                                    </a>
                                    <a class="btn btn-danger btn-sm" onclick="enviar_formulario()">
                                      <i class="far fa-trash-alt"></i>
                                      Eliminar
                                    </a>
                                  </td>
                                </tr>
                                {{--  {{route('back.patient.appointment.update', $appointment)}}  --}}
                                @endforeach
                              </tbody>
                          </table>
                      </div>
                      <form method="POST" action="{{ route('recipes.destroy', $recipe) }}" name="delete_form">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                      </form>
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
<script>
  function enviar_formulario(){
      Swal.fire({
          title: '¿Estas seguro?',
          text: "¡No podrás revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, estoy seguro!',
          cancelButtonText: 'Cancelar'
      }).then((result) => {
          if (result.isConfirmed) {
              document.delete_form.submit();
          }
      })
  }
</script>
@if (session('flash') == 'eliminado')
<script>
    Swal.fire(
        '¡Eliminado!',
        'El registro ha sido eliminado.',
        'success'
      )
</script>
@endif
@if (session('flash') == 'registrado')
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
            title: 'La receta fue registrada.'
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



