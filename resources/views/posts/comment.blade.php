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
    <div class="card bg-light   m-3">
        <div class="card-header">
            <h3 class="card-title">
                <p class="float-left text-white">
                   
                </p>
                <p class="float-right">
                   
                </p>
            </h3>
        </div>
        <div class="card-body">
            <p class="card-text text-black">
                {{ $posts->body }}
            </p>
            <div class="card-body">
                <img src="{{ asset('storage/' . $posts->image) }}" style="height:220px;margin-left: 80px;">
        </div>
        <div class="card-footer">
           
            <p class="float-right text-black">
                {{$posts->created_at}}
                
            </p>
        </div>
        </div>
        <h2> Add a Comment</h2>
        <form  method="POST" action="{{route("comment.store", $posts->id)}}" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="form-group">
                
                <input type="text" class="form-control" name="body"  >
            </div>
            <div class="form-group">
                <label>add an attachement</label>
                <input type="file" class="form-control" name="attachement"  >
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Submit">
                </div>
        </form>
        
        </div>
        
    </div>

    