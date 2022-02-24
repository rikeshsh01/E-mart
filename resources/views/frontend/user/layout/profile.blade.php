<div class="card-body">
    <div class="d-flex flex-column align-items-center text-center">
      {{-- <img src="{{$user->photo}}" alt="Image" class="rounded-circle" width="150"> --}}
      <div class="mt-3">
        <h4>{{$user->full_name}}</h4>
        <p class="text-secondary mb-1">{{$user->username}}</p>
        <p class="text-muted font-size-sm">{{$user->role}}</p>
      
      </div>
    </div>
  </div>