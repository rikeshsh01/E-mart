<div class="card mt-3">
    <ul class="list-group list-group-flush">
      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap {{\Request::is('user/dashboard')? 'active':''}}">
        <h6 class="mb-0">
            
            <a href="{{route('user.account')}}" style="color: black">Dashboard</a>                        
        </h6>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap {{\Request::is('user/order')? 'active':''}}">
        <h6 class="mb-0">
            
            <a href="{{route('user.order')}} "style="color: black">Orders</a>                        
        
        </h6>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap {{\Request::is('user/wishlist')? 'active':''}}">
        <h6 class="mb-0">
            
          <a href="{{route('user.wishlist')}}" style="color: black">Wishlist</a>                        
            
        </h6>
      </li>

      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap {{\Request::is('user/myaccount')? 'active':''}}">
        <h6 class="mb-0">
            
          <a href="{{route('user.myaccount')}}" style="color: black">My Account</a>                        
            
        </h6>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
        <h6 class="mb-0">
            
          <a href="{{route('user.logout')}}" style="color: black">Log Out</a>                        

        </h6>
      </li>

    </ul>
  </div>