@extends('layouts.admin')
@section('title','Recetas '. $recipe->created_at->format('d/m/Y'))
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
                        <li class="breadcrumb-item active">Detalles de receta</li>
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
                            <div class="card-tools">
                              
                               
                                  <small class="mr-3">Fecha: {{$recipe->created_at->format('d/m/Y')}}</small>
                               
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Medicamento</th>
                                                    <th>Indicaciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach ($details as $detail)
                                              <tr>
                                                <td>{{$detail->medicine}}</td>
                                                <td>{{$detail->instruction}}</td>
                                              </tr>
                                              @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-6">
                                        <p class="lead">Observaciones:</p>
                                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                            {{$recipe->observations}}
                                        </p>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                      <p class="lead">Diagnostico:</p>
                                      <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                          {{$recipe->diagnostic}}
                                      </p>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-12">
                                      <a href="{{ URL::previous() }}" class="btn btn-secondary">Atrás</a>
                                        
                                      <button type="button" class="btn btn-primary float-right"
                                            style="margin-right: 5px;">
                                          <i class="fas fa-download"></i> Generar PDF
                                      </button>
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

@endsection
