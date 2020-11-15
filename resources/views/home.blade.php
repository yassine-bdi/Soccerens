@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
               

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form  method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          
                          <input type="text" class="form-control" placeholder="What's on your mind ?..." name="body" id="body" style="height:80px" >
                        </div>
                       
                        <div class="form-group">
    
                            <label for="file-input">
                                <li class="fas fa-camera"></li>
                            </label>
                        
                            <input  type="file" name="image"/>
                          </div>
                          
                        <button type="submit" class="btn btn-primary">Publish</button>
                      </form> 
                    </div>
                </div>
            </div>
        </div>
        
            <br>
            @foreach($posts->sortByDesc('created_at') as $post)
            <div class="card   m-4">
                <div class="card-header">
                    @if( $post->user->profile_image != NULL ) 
            
                    <img src="{{ asset('storage/' . $post->user->profile_image) }}"  style=" height: 40px;   border-radius: 100%" class="cars-img-top">
                    @else
                    <img src="{{ asset('defaultavatar.jpg') }}"  style=" height:30px;   border-radius: 100%" class="cars-img-top">
                    @endif 
                      
                         <a href="{{ route('user.show', $post->user->id)}}">{{ $post->user->name }} </a> | {{ $post->user->title}}
                          
                          <p class="float-right text-black">
                          {{$post->created_at->diffForHumans()}}
                          
                      </p>
              
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
                <div class="card-footer">
                   
                  
                    <div class="custom-control-inline">
                        <form action="{{route('addlike', $post->id)}}" method="POST">
                         
                          @csrf
                         <button class="btn btn-success text-light" style="border-radius:100%" type="submit" >
                          <i class="fas fa-thumbs-up"></i>
                          </button>
                      </form>
                    
                     
                      
                       
                      @if($post->user->id == Auth::user()->id)
                       <form action="{{ route('posts.edit', $post->id ) }}" action="GET">@csrf  <button class="btn btn-success text-white" data-toggle="tooltip" title="edit post" style="border-radius:100%"><i class="fas fa-pen"></i></a></button></form>
                      @endif
                      <form action="{{ route('posts.show', $post->id  ) }}" action="GET"> @csrf   <button class="btn btn-success text-white" data-toggle="tooltip" title="make a comment!" style="border-radius:100%"> <i class="fas fa-comment-alt"></i></a></button>  </form>
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
            </div>
            @endforeach
      {{ $posts->links() }}  
     </div>
    </div>
    
       
        
</div>
@endsection
