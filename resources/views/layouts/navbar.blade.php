
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><h3>Notifications System</h3></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('init')}}">Home </a>
      </li>
      
    @if(session('user_id'))
      <li class="nav-item">
        <a class="nav-link" href="{{route('user.dashboard')}}">Dashboard</a>
      </li>    
      @endif
    </ul>


    
    @if(session('user_id'))
    <div style="margin: 1rem;">
      <h3>Welcome {{session('name')}} </h3> 
    </div>
    
    <div style="margin: 1rem;">  
    <a href="{{route('user.logout')}}" class="btn btn-outline-danger my-2 my-sm-0" >log out</a>
    </div>
    @else
    
    <div style="margin: 0.5rem;">    
    <button  class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#SignUpUser">Sign Up</button><label for="">  _</label>
    </div>
    
    <div style="margin: 1rem;">
      <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#LogUser">Log in</button>
    </div> 
    @endif
</nav>