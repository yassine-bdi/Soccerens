@extends('layouts.app') 

@section('content')
<script src="{{asset( 'js/jquery-3.4.0.js') }}"></script>
<div class="container py-4">
  @if($errors->any()) 
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul>
    @foreach($errors->all() as $error)
    
        <li>{{$error}}</li>
    @endforeach 
    </ul>
    </div>
    @endif 
<form  method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      
      <textarea type="text" class="form-control" row="6" placeholder="What do you wanna share ?..." name="body" id="body" style="height:80px" >
   </textarea> </div>
    <div class="form-group">
    
      <label for="file-input">
          <li class="fas fa-camera"></li>
      </label>
  
      <input  type="file" name="image"/>
    </div>
    <button type="submit" class="btn btn-primary">Publish</button>
  </form> 
</div>
<script>
    $('#body').autoResize();
</script>
  @endsection
