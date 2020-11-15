@extends('layouts.app')
@section('content')
 @if(session()->has('statut'))
    <div class ="container">
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
       <h5>{{session()->get('statut')}}</h5>
    </div>
    </div>
    @endif 
    <div class="container">
        <h1> <center>{{ $posts->user->name}}'S POST </center></h1>
    <div class="card bg-light   m-3 shadow ">
      
        <div class="card-body">
            <p class="card-text text-black">
                {{ $posts->body }}
            </p>

            @if($posts->image != NULL)
            <div class="card-body">
                <img src="{{ asset('storage/' . $posts->image) }}" style="height:220px;">
        </div>
          @endif
        
        <div class="card-body">
           
            <p class="float-right text-black">
                 {{$posts->created_at->diffForHumans()}}
                
            </p>
        </div>
        </div>  </div>
    </div><br><br><br>
       <div class="container">
        <div class="card bg-light   m-3 ">
           
           
                @foreach($posts->comments as $comment)
                 <div class="card-body"> <div>
                    @if( $comment->user->profile_image != NULL )
                    <img src="{{ asset('storage/' . $comment->user->profile_image ) }}"  style=" height: 30px;   border-radius: 100%" class="cars-img-top">
                    @else
                    <img src="{{ asset('defaultavatar.jpg') }}"  style=" height:30px;   border-radius: 100%" class="cars-img-top">
                      
                      @endif
                       <a href="{{ route('user.show', $comment->user->id)}}" class="text-green"><b> {{$comment->user->name}} </b> </a> </div>
                 <p>{{$comment->body}}</p> 
                 @if($comment->attachement != NULL)
                 <img src="{{asset('storage/'. $comment->attachement) }}" style="height:150px">
                 @endif
                </div>
                <hr>
                @endforeach 
             <div class="card-body">
                 
        <form  method="POST" action="{{route("addcomment", $posts->id )}}" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="form-group">
                
                <input type="text" class="form-control" name="body" placeholder="Add a comment..">
            </div>
            <div class="form-group">
                <label>add an attachement</label>
                <input type="file" class="form-control" name="image"  >
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Submit">
                </div>
        </form>
        
        </div>
      
    
    </div>
</div>

    @endsection 

    