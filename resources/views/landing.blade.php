@extends('welcome')
@section('content')
<div id="carouselExampleControls" class="carousel slide "  data-ride="carousel">
    <div class="carousel-inner" style="max-height: 70rem" >
      <div class="carousel-item active" >
        <img src="https://static01.nyt.com/images/2016/12/14/well/move/14physed-running-photo/14physed-running-photo-videoSixteenByNineJumbo1600.jpg" class="img-fluid" style="height: 40rem; width:100%"  alt="...">
     
    
    @if(session('user_id'))
     <div class="carousel-caption d-none d-md-block">
        <a href="" style="color: white"><h1>Sports</h1></a>
        <p>Subscribe to our sports hub for live updates, expert insights, and an interactive community. Join us in celebrating the world of sports!</p>
      </div>
      @endif
    </div>
      <div class="carousel-item" style="max-height: 70rem" >
        <img src="https://blog.mystart.com/wp-content/uploads/taken.jpg" class="img-fluid" style="height: 40rem; width:100%"  alt="...">
       
    
    @if(session('user_id'))
        <div class="carousel-caption d-none d-md-block">
            <a href="" style="color: white"><h1>Movies</h1></a>
            <p>Calling all movie lovers! Subscribe to our movie space and unlock a world of cinematic wonders. Dive into reviews, behind-the-scenes exclusives, and recommendations for your next movie night.</p>
        </div>
        @endif
    </div>
      <div class="carousel-item" style="max-height: 70%" >
        <img src="https://passiveincomemd.com/wp-content/uploads/2019/12/top-ten-matter-most-personal-finance-2048x1365.jpg" class="d-block " style="height: 40rem; width:100%"  alt="...">
      
    
    @if(session('user_id'))
        <div class="carousel-caption d-none d-md-block">
                <a href="" style="color: white"><h1>Finances</h1></a>
                <p>Unlock financial wisdom. Subscribe to stay updated on investments, savings, and economic insights.</p>
            </div>
            @endif
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
@endsection