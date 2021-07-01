@if (!isset($appointment))
  @if (Auth::user()->hasRole('Doctor'))
    <input type="hidden" name="doctor" value="{{ Auth::id() }}"> 
  @else
    <div class="form-row">
      <div class="col-md-6">
          <div class="form-group">
            <label for="specialty">Seleccionar especialidad</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
              </div>
              <select class="form-control" name="specialty" id="specialty">
                <option selected disabled>Selecciona una especialidad</option>
                @foreach ($specialties as $specialty)
                <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
          <label for="doctor">Seleccione un doctor</label>
          <div class="input-group">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user-md"></i></span>
              </div>
              <select class="form-control" name="doctor" id="doctor">
              <option selected disabled>Seleccione un doctor</option>
              {{--  Doctores  --}}
              </select>
          </div>
          </div>
      </div>
    </div>      
  @endif
@else
<div class="form-group">
  <label for="status">Estado de la cita</label>
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="fas fa-question"></i></span>
    </div>
    <select class="form-control" name="status" id="status">
      <option selected>-- Selecciona el estado de la cita --</option>
      <option value="pending" 
      @if ($appointment->status == 'pending')
          selected
      @endif
      >Pendiente</option>
      <option value="done"
      @if ($appointment->status == 'done')
          selected
      @endif
      >Terminada</option>
      <option value="cancelled"
      @if ($appointment->status == 'cancelled')
          selected
      @endif
      >Cancelada</option>
    </select>
  </div>
</div>  
@endif
<div class="form-row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="date">Seleccione una fecha</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="date_ap"><i class="fas fa-calendar-day"></i></span>
          </div>
          <input type="date" name="date"
          @if (isset($appointment))
            data-value="{{$appointment->date->format('Y-m-d')}}"
          @endif
          class="form-control datepicker" id="date" aria-describedby="date_ap" required>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="time">Seleccione un horario</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="time_ap"><i class="far fa-clock"></i></span>
          </div>
          <input type="time" name="time"
          @if (isset($appointment))
            data-value="{{$appointment->date->format('H:i')}}"
          @endif
          class="form-control timepicker" id="time" aria-describedby="time_ap" required>
        </div>
      </div>
    </div>
</div>

<input type="hidden" name="user_id" value="{{ encrypt( $user->id )}}"> 
