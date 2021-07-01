@extends('layouts.user_admin')
@section('title','Perfil')
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
              <li class="breadcrumb-item">{{Auth::user()->name}}</li>
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
            {{--  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>  --}}
            @include('patient._nav')
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header p-2">

                <h3 class="card-title">Información de perfil</h3>

              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="form-row">
                    <div class="col-md-8">
                      <strong><i class="fas fa-book mr-1"></i> Nombre</strong>
                      <p class="text-muted">
                        {{$user->name}}
                      </p>
                      <hr>
                      <strong><i class="far fa-file-alt mr-1"></i> Apellidos</strong>
                      <p class="text-muted">
                        {{$user->profile->surnames}}
                      </p>
                      <hr>
                      <strong><i class="fas fa-pencil-alt mr-1"></i> Fecha de nacimiento</strong>
                      <p class="text-muted">
                        {{--  {{$user->profile->birthdate->format('l jS \\of F Y')}}  --}}
                      </p>
                      <hr>
                      <strong><i class="fas fa-pencil-alt mr-1"></i> Edad</strong>
                      <p class="text-muted">
                        {{$user->age()}}
                      </p>
                      <hr>
                      <strong><i class="fas fa-map-marker-alt mr-1"></i> Correo electrónico</strong>
                      <p class="text-muted">
                        {{$user->email}}
                      </p>
                      <hr>
                      <strong><i class="fas fa-map-marker-alt mr-1"></i> Miembro desde</strong>
                      <p class="text-muted">
                        {{$user->created_at->diffForHumans()}}
                      </p>
                    </div>
                    <div class="col-md-4">
                      <strong><i class="far fa-file-alt mr-1"></i> Fotografía de perfil</strong>
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle"
                               src="{{$user->profile->image->url}}"
                               alt="{{$user->name}}">
                        </div>
                      </div>
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
