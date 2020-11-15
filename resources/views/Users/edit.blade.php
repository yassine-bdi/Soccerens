@extends('layouts.app')

@section('content') 
 <div class="container py-4">
<form  method="POST" action="{{ route('user.update', [$user,'id' => $user->id]) }}" enctype="multipart/form-data">
    
    @csrf
    @method('PUT')
    
    @if($errors->any()) 
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    @foreach($errors->all() as $error)
    <ul>
        <li> {{$error}}</li>
    @endforeach 
    </ul>
    </div>
    @endif 
     
         @if($user->profile_image != NULL)
         <div class="form-group">
         <img src="{{ asset('storage/' . $user->profile_image) }}"  style="height:120px;  border-radius: 100%">
        <label>Edit profile picture</label>
        <input type="file" class="form-control" name="image" value="{{ $user->profile_image}}" >
        </div>
        @else 
        <label>Add profile picture</label>
        <input type="file" class="form-control" name="image" value="" >
        @endif 
        @if($user->cover_image != NULL)
         <div class="form-group">
         <img src="{{ asset('storage/' . $user->cover_image) }}"  style="height:120px;  border-radius: 20%">
        <label>change cover photo </label>
        <input type="file" class="form-control" name="cover" value="{{ $user->cover_image}}" >
        </div>
        @else 
        <label>Add cover photo</label>
        <input type="file" class="form-control" name="cover" value="" >
        @endif 
       
    
    <div class="form-group">
        <label>Edit name</label>
        <input type="text" class="form-control" name="name" value="{{ $user->name }}" >
    </div>
    @if(Auth::user()->role == "admin")
    <div class="form-group">
  <label for="sel1">Select role:</label>
  <select class="form-control" id="sel1" name="role">
    <option>user</option>
    <option>admin</option>
   
  </select>
</div>
@endif
    <div class="form-group">
        <label>Edit Email</label>
        <input type="email" class="form-control" name="email" value="{{ $user->email }}" >
    </div>
    <div class="form-group">
        <label>Edit About</label>
        <input type="text" class="form-control" name="about" value="{{ $user->about}}" >
    </div>
    <div class="form-group">
        <label>Add title</label>
        <input type="text" class="form-control" name="title" value="{{ $user->title}}" >
    </div>
    <div class="form-group">
        <label>Edit Country</label>
        <input type="text" class="form-control" name="country" value="{{ $user->country}}" >
    </div>
    <div class="form-group">
        <label>Social links</label>
        <input type="text" class="form-control" name="social" value="{{ $user->social}}" >
    </div>
   
    
    
    <div class="form-group">
    <input type="submit" class="btn btn-success" value="Submit">
    </div>
</form>

<div class='bg-dark px-5 py-6'> 
@if(Auth::user()->role != 'admin')
<button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#myModal2" data-backdrop="true"  >
        delete My account
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
        <div class="modal-body"><h5> Are you sure you want to delete your account ? <br> THIS CAN'T BE UNDONE </h5> <br>
         <form action="{{route('user.destroy',['$id' =>Auth::user()->id, $user])}}" method="POST">
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
@endsection

