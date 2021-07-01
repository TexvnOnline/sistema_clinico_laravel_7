@extends('layouts.admin')
@section('title','Editar factura '. $invoice->id)
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
              <li class="breadcrumb-item"><a href="{{route('back.patient.invoice', $user)}}">Facturas</a></li>
              <li class="breadcrumb-item active">Editar factura</li>
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
                  <h3 class="card-title">Editar factura</h3>
                </div><!-- /.card-header -->
                {{--  {!! Form::open(['route'=>'back.patient.store_appointment', 'method'=>'POST']) !!}  --}}
                {!! Form::model($invoice, ['route'=>['back.patient.update.invoice',$user, $invoice],'method'=>'PUT']) !!}

                <div class="card-body">
                  <div class="tab-content">
                     
                    <div class="form-group">
                      <label for="amount">Monto de la factura</label>
                      <input type="number" name="amount" id="amount" class="form-control" value="{{$invoice->amount}}">
                    </div>

                    <div class="form-group">
                      <label for="status">Estado de la factura</label>
                      <select class="form-control" name="status" id="status">
                        <option value="pending"
                        @if ($invoice->status == 'pending')
                            selected
                        @endif
                        >Pendiente</option>
                        <option value="approved"
                        @if ($invoice->status == 'approved')
                            selected
                        @endif
                        >Pagado</option>
                        <option value="rejected"
                        @if ($invoice->status == 'rejected')
                            selected
                        @endif
                        >Rechazado</option>
                        <option value="cancelled"
                        @if ($invoice->status == 'cancelled')
                            selected
                        @endif
                        >Cancelado</option>
                        <option value="refunded"
                        @if ($invoice->status == 'refunded')
                            selected
                        @endif
                        >Reembolsado</option>
                      </select>
                    </div>
                    
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
                <div class="card-footer text-muted">
                  <button type="submit" class="btn btn-primary float-right">Actualizar</button>
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

@endsection



