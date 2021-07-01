<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <div class="text-center">
      <img class="profile-user-img img-fluid img-circle"
           src="{{$user->profile->image->url}}"
           alt="{{$user->name}}">
    </div>
    <h3 class="profile-username text-center">{{$user->name}}</h3>
    <ul class="list-group list-group-unbordered mb-3">
      <li class="list-group-item">
        <b>Edad</b> <a class="float-right">{{$user->age()}}</a>
      </li>
      <li class="list-group-item">
        <b>Email</b> <a class="float-right">{{$user->email}}</a>
      </li>
      <li class="list-group-item">
        <b>Miembro desde</b> <a class="float-right">{{$user->created_at->diffForHumans()}}</a>
      </li>
    </ul>
  </div>
</div>