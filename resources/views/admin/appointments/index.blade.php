@extends('layouts.admin')
@section('title','Citas programadas')
@section('style')
<!-- FullCalendar -->
{!! Html::style('fullcalendar/packages/core/main.css') !!}
{!! Html::style('fullcalendar/packages/daygrid/main.css') !!}
{!! Html::style('fullcalendar/packages/timegrid/main.css') !!}
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Citas programadas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Citas programadas</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Citas programadas</h3>
                </div>
                <!-- /.card-header -->
                <div id="calendar" class="card-body">
                 
                </div>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
@section('script')
<!-- FullCalendar -->
{!! Html::script('fullcalendar/packages/core/main.min.js') !!}
{!! Html::script('fullcalendar/packages/interaction/main.js') !!}
{!! Html::script('fullcalendar/packages/daygrid/main.js') !!}
{!! Html::script('fullcalendar/packages/timegrid/main.js') !!}

<script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        editable: false,
        eventLimit: true,
        events: {!! $appointments !!}
      });
      calendar.render();
    });
</script>
@endsection
