<div class="list-group mb-4">
    @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Secretary') || Auth::user()->hasRole('Doctor'))
    <a href="{{route('users.show', $user)}}" class="list-group-item list-group-item-action
    {!! active_class(route('users.show', $user)) !!}
    ">
        Perfil
    </a>
        @if ($user->hasRole('Patient'))
            <a href="{{route('clinical.data.index', $user)}}" class="list-group-item list-group-item-action
            {!! active_class(route('clinical.data.index', $user)) !!}
            ">
                Historia clínica
            </a>
            <a href="{{route('back.patient.appointment', $user)}}" class="list-group-item list-group-item-action
            {!! active_class(route('back.patient.appointment', $user)) !!}
            ">
                Agendar cita
            </a> 
            <a href="{{route('back.patient.appointments', $user)}}" class="list-group-item list-group-item-action
            {!! active_class(route('back.patient.appointments', $user)) !!}
            ">
                Citas
            </a>
            <a href="{{route('back.patient.invoice', $user)}}" class="list-group-item list-group-item-action
            {!! active_class(route('back.patient.invoice', $user)) !!}
            ">
                Facturas
            </a>
            <a href="{{route('recipes.create', $user)}}" class="list-group-item list-group-item-action
            {!! active_class(route('recipes.create', $user)) !!}
            ">
                Prescribir recetas
            </a>
            
            <a href="{{route('recipes.index', $user)}}" class="list-group-item list-group-item-action
            {!! active_class(route('recipes.index', $user)) !!}
            ">
                Recetas
            </a>
        @endif
        @if ($user->hasRole('Doctor'))
        {{--  <a href="{{route('doctor.appointments', $user)}}" class="list-group-item list-group-item-action
        {!! active_class(route('doctor.appointments', $user)) !!}
        " target="_blank">
            Citas
        </a>  --}}
        <a href="{{route('doctor.schedule.assign', $user)}}" class="list-group-item list-group-item-action
        {!! active_class(route('doctor.schedule.assign', $user)) !!}
        ">
            Gestión de horarios
        </a>
        @endif
    @endif
    @if (Auth::user()->hasRole('Admin'))
        {{--  asignar roles  --}}
        @if ($user->hasRole('Doctor'))
            <a href="{{route('doctor.assign_specialty', $user)}}" class="list-group-item list-group-item-action
            {!! active_class(route('doctor.assign_specialty', $user)) !!}
            ">
                Asignar especialidad
            </a> 
        @endif
    @endif
</div>