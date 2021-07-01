<div class="list-group mb-2">
    <a href="{{route('patient.index')}}" class="list-group-item list-group-item-action 
    {!! active_class(route('patient.index')) !!}
    ">
      Perfil
    </a>
    <a href="{{route('patient.appointment')}}" class="list-group-item list-group-item-action
    {!! active_class(route('patient.appointment')) !!}
    ">
      Agendar cita
    </a>
    <a href="{{route('patient.appointments')}}" class="list-group-item list-group-item-action
    {!! active_class(route('patient.appointments')) !!}
    ">
      Mis citas
    </a>
    <a href="{{route('patient.prescriptions')}}" class="list-group-item list-group-item-action
    {!! active_class(route('patient.prescriptions')) !!}
    ">
      Recetas
    </a>
    <a href="{{route('patient.invoice')}}" class="list-group-item list-group-item-action
    {!! active_class(route('patient.invoice')) !!}
    ">
      Facturación
    </a>
    <a href="{{route('patient.edit_profile')}}" class="list-group-item list-group-item-action
    {!! active_class(route('patient.edit_profile')) !!}
    ">
      Editar perfil
    </a>
    <a href="{{route('patient.edit_password')}}" class="list-group-item list-group-item-action
    {!! active_class(route('patient.edit_password')) !!}
    ">
      Modificar contraseña
    </a>
</div>