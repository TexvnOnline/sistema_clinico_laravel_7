@extends('layouts.admin')
@section('title','Agendar cita')
@section('style')
{!! Html::style('pickadate/themes/default.css') !!}
{!! Html::style('pickadate/themes/default.date.css') !!}
{!! Html::style('pickadate/themes/default.time.css') !!}   
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
              <li class="breadcrumb-item active">Agendar cita</li>
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
                  <h3 class="card-title">Agendar cita</h3>
                </div><!-- /.card-header -->
                {!! Form::open(['route'=>'back.patient.store_appointment', 'method'=>'POST']) !!}
                <div class="card-body">
                  <div class="tab-content">
                    @include('includes._appointment_form')
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
                <div class="card-footer text-muted">
                  <button type="submit" class="btn btn-primary float-right">Agendar</button>
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
@include('includes._appointment_javascript') 
@endsection



