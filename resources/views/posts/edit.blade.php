@extends('layouts.app')

@section('content')
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
  <form  method="POST" action="{{route('posts.update', [ 'id' => $posts->id, $posts])}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        
        <input type="text" class="form-control" placeholder="What's on your mind ?..." name="body" id="body" style="height:80px" value="{{ $posts->body }}">
      </div>
           <img src={{asset('storage/' . $posts->image) }} class="img-fluid">
        <div class="form-group">
          <label >change image</label>
          <input type="file" class="form-control" name="image" value="{{ $posts->image}}">
        </div>
        
      <button type="submit" class="btn btn-primary">Publish</button>
    </form> 
  </div>
    
@endsection