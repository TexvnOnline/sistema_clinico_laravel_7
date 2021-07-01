@extends('layouts.errors')
@section('title', 'No tiene permisos')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>403 Página de error</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            @if (Auth::user()->hasRole('Patient'))
                <li class="breadcrumb-item"><a href="{{route('patient.index')}}">Inicio</a></li>
            @else
                <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
            @endif
              <li class="breadcrumb-item active">403 Página de error</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-warning"> 403</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> ¡Ups! Página no encontrada.</h3>

          <p>
            No pudimos encontrar la página que buscaba. Mientras tanto, puede <a 
            @if (Auth::user()->hasRole('Patient'))
            href="{{route('patient.index')}}"
            @else
            href="{{route('home')}}"
            @endif 
            >volver al panel de control.</a>
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>
@endsection