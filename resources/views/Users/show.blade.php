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
<div style="background: url({{ asset('storage/' . $user->cover_image) }}) ; background-repeat:no-repeat; " class=" container" >
<div  >
  @if( $user->profile_image != NULL ) 
            
  <img src="{{ asset('storage/' . $user->profile_image) }}"  style="height:220px;margin-left: 40%;    border-radius: 100%; border:2px" class="cars-img-top img-thumbnail">
  @else 
  <img src="{{ asset('defaultavatar.jpg') }}"  style="height:220px;margin-left: 42%;    border-radius: 100%" class="cars-img-top">
    @endif
        
    
  
        
    <h1 class="text-white"  align="center" ><b>{{ $user->name}}</b></h1> 
        
    
</div> 
</div> 
<br>
<div class="container">
  <div class="card bg-light">
    <div class="card-body"> 
      <div class="float-right">
    <!-- Button to Open the Modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" data-backdrop="true">
    Infos
  </button>
  
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">{{$user->name . "'s infos"}}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
           <h4> About {{$user->name}} : {{$user->about }} </h4>
         <h4> occupation :   {{$user->title}}  </h4>
         <h4>  from :  {{$user->country}} </h4>
         <h4> social links :   {{$user->social}}  </h4>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>
 
  
   @if($user->id == Auth::user()->id)


<button class="btn btn-success text-white"  ><a href="{{route('posts.create') }}" class="text-white">create post</a></button>
<button class="btn btn-success text-white"><a href="{{ route('user.edit', Auth::user()->id) }}" class="text-white"  >profile settings </a></button>
 @endif
      @if(Auth::user()->role == 'admin' && $user->id == Auth::user()->id )
<button class="btn btn-success text-white"  ><a href="{{route('admin') }}" class="text-white">administration</a></button>
     @endif
     @if($user->id != Auth::user()->id )
      </div>  <button type="button" style="border-radius: 100%" class="btn btn-success" data-toggle="modal" data-target="#myModal1" data-backdrop="true"><i class="fas fa-comments"></i>
         </button>
      
      <!-- The Modal -->
      <div class="modal fade" id="myModal1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">{{"send message to" . $user->name }}</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
            <form action="{{ route('send', [$user->id , 'name' => Auth::user()->name])}}" method="POST">
              @csrf 
              <input type="text" placeholder="enter a message..." name="message" class="form-control">
             <br><button type="submit" class="btn btn-success text-white">Send</button>
            </form>       
      
            <!-- Modal footer -->
            <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
      
          </div>
        </div>
      </div>
      @endif
    </div> </div>
      
  </div>
 


<div class="container">
    @if(Auth::user()->posts == NULL)
    <p>no posts to show </p>
    @endif
    @foreach($user->posts->sortByDesc('created_at') as $post)
   
<div class="card bg-light   m-3">
    <div class="card-header">
      <div>
      @if( auth::user()->profile_image != NULL ) 
            
      <img src="{{ asset('storage/' . Auth::user()->profile_image) }}"  style=" height: 30px;   border-radius: 100%" class="cars-img-top">
      @else
      <img src="{{ asset('defaultavatar.jpg') }}"  style=" height:30px;   border-radius: 100%" class="cars-img-top">
      @endif 
        
           {{ $post->user->name}}
            <p class="float-right text-black">
            {{$post->created_at->diffForHumans()}}
            
        </p>

        
      </div>
    </div>
    <div class="card-body">
        <p class="card-text text-black">
            {{ $post->body }}
        </p>
        @if($post->image != NULL)
        <div class="card-body">
            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid">
    </div>
      @endif
  
       
      
          
      
           
      
      <div class="custom-control-inline">
        <form action="{{route('addlike', $post->id)}}" method="POST">
         
          @csrf
          <button class="btn btn-success text-light" style="border-radius:100%" type="submit" >
          <i class="fas fa-thumbs-up"></i>
          </button>
      </form>
    
     
      
         @if($post->user->id == Auth::user()->id)
      
       <form action=" {{ route('posts.edit', $post->id ) }}" method="GET"> @csrf <button class="btn btn-success text-white" style="border-radius:100%"><i class="fas fa-pen"></i></a></button> </form>
     @endif <form action=" {{ route('posts.show', $post->id  ) }}" method="GET">  @csrf <button class="btn btn-success text-white" style="border-radius:100%"> <i class="fas fa-comment-alt"></i></a></button>  </form>
     @if($post->user->id == Auth::user()->id) <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#myModal2" data-backdrop="true"  style="border-radius:100%">
        <i class="fas fa-trash"></i>
      </button> <!-- The Modal -->
  <div class="modal fade" id="myModal2">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4>WARNING!</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body"><h5> Are you sure you want to delete this post ? </h5> <br>
         <form action="{{route('posts.destroy',['$id' =>$post->id, $post])}}" method="POST">
            @method("DELETE")
            @csrf
            <button class="btn btn-danger text-light"  type="submit" >
            YES
            </button> <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
        </form>
       
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
         
        </div>
  
      </div>
    </div>
  </div>  
  @endif
    </div>
    
</div>
</div>
@endforeach
@endsection 