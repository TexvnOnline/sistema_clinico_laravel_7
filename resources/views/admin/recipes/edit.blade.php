@extends('layouts.admin')
@section('title','Modificar receta')
@section('style')

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
              <li class="breadcrumb-item"><a href="{{route('recipes.index', $user)}}">Recetas</a></li>
              <li class="breadcrumb-item active">Modificar receta</li>
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
                <h3 class="card-title">Modificar receta</h3>
                <div class="card-tools">
                    <small class="mr-3">Fecha: {{$recipe->created_at->format('d/m/Y')}}</small>
              </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                {!! Form::model($user, ['route'=>['recipes.update',$user,$recipe],'method'=>'PUT']) !!}
                  <div class="form-group">
                    <table id="TablaPro" class="table table-sm">
                      <thead>
                          <tr>
                              <th scope="col">Medicamento</th>
                              <th scope="col">Indicaciones</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($details as $detail)
                            <tr>
                                <td><input name="medicinef[]" type="text" class="form-control" value="{{$detail->medicine}}"></td>
                                <td><input name="instructionf[]" type="text" class="form-control" value="{{$detail->instruction}}"></td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class="form-group">
                    <label for="observations">Observaciones</label>
                    <textarea class="form-control" name="observations" id="observations" rows="3">{{$recipe->observations}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="diagnostic">Diagnostico</label>
                    <textarea class="form-control" name="diagnostic" id="diagnostic" rows="2">{{$recipe->diagnostic}}</textarea>
                  </div>
                  <div class="form-group">
                    <a href="{{ URL::previous() }}" class="btn btn-secondary">Atrás</a>
                    <button type="submit" class="btn btn-primary float-right">Actualizar</button>
                  </div>
                  
                  {!! Form::close() !!}
                  
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

@endsection