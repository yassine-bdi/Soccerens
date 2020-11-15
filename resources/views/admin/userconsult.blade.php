@extends('layouts.app')
@section('content')
<div style="background: url(../qHXu91n.jpg); background-repeat:no-repeat; " class="container" >
    <div  >
      @if( $user->profile_image != NULL ) 
                
      <img src="{{ asset('storage/' . $user->profile_image) }}"  style="height:220px;margin-left: 40%;    border-radius: 100%" class="cars-img-top">
      @else 
      <img src="{{ asset('defaultavatar.jpg') }}"  style="height:220px;margin-left: 42%;    border-radius: 100%" class="cars-img-top">
        @endif
            
        
      
            
        <h1 class="text-white"  align="center" ><b>{{ $user->name}}</b></h1> 
            
         <!-- Button to Open the Modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" data-backdrop="true">
    Infos & statistics 
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
         <h4> registred at : {{$user->created_at}} <h4>
         <h4> posts : {{ $posts}} </h4>
         <h4> messages sent : {{ $sent}} </h4>
         <h4> messages received : {{ $received}} </h4>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>
  <button class="btn btn-success text-white"><a href="{{ route('user.edit', $user->id) }}" class="text-white"  >modify profil </a></button>
  <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#myModal2" data-backdrop="true"  >
        delete user
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
        <div class="modal-body"><h5> Are you sure you want to delete this user ? </h5> <br>
         <form action="{{route('user.destroy',['$id' =>$user->id, $user])}}" method="POST">
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
  </div>    <br><br><br>
    </div> 
    </div> 
    @endsection