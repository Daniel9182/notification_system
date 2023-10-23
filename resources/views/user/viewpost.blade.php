@extends('user.home')

@section('content')

@foreach ($types as $type)
<a class="btn btn-primary btn-lg" href="{{'../post/'.$type->id}}" role="button">back</a>
@endforeach
<br>
<div class="jumbotron">

    @foreach ($image as $item)
    <img src="{{asset($item->url)}}" class="img-fluid rounded mx-auto d-block" alt="Responsive image">
        
    @endforeach
    
    <h1 class="display-4">{{$data->title}}</h1>
    <p class="lead">{{$data->description}}</p>
    <hr class="my-4">
    
    @if (in_array(2,array_column(json_decode($types_user,true),'id')))
    <h1>Subscribers</h1>

    <div class="card bg-light mb-3">
        <div class="card-header">Header</div>
            <div class="card-body">
                <table id="miTabla" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>user</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
        <a class="btn btn-primary btn-lg" href="{{'../post/'.$type->id}}" role="button">Send</a>
    </div>
    @else
        <h4>have a good day!</h4>
    @endif
    
    
@endsection