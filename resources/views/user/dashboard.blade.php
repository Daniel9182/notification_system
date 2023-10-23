@extends('user.home')
@section('content')
<div class="content-fluid"> 
  <br><br>
  
  <div class="row">
    @foreach ($types as $item_type) 
    <div class="card text-white bg-primary mb-3 " style="max-width: 18rem;min-width: 18rem; margin:0.8rem;">
      <div class="card-header">User type</div>
      <div class="card-body">
        <h3 class="card-title">{{ucfirst($item_type->name)}}</h3>
        </div>
    </div>
    @endforeach
  </div>

  <h1>Categories</h1>
    <div class="row">
      @foreach ($categories as $item)
        <div class="col-sm-3">
          <div class="card" style="margin:0.2rem; min-height:18rem;">
            <div class="card-body">
              <h5 class="card-title">{{$item->name}}</h5>
              <p class="card-text">{{$item->description}}</p>
         
              @foreach ($types as $key => $item_type) 
                @if (count($types)<2)
                  @if ($item_type->id == 1)
                    @if (in_array($item->id,array_column(json_decode($subs,true),'id')))
                        <h4>You are subscribe!</h4>
                    @else
                    <a type="button" href="{{route('user.subscribe',$item->id)}}" class="btn btn-success" >Subscribe me!</a> 
                    @endif
                  @endif 
                @endif
              @endforeach
            </div>
          </div>
        </div>
      @endforeach
      </div>
</div>
@endsection