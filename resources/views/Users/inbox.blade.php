@extends('layouts.app')
@section('content')
<div class="container">
<section class="content inbox">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card action_bar">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-1 col-md-2 col-3">
                                <div class="checkbox inlineblock delete_all">
                                    <input id="deleteall" type="checkbox">
                                    <label for="deleteall">
                                        All
                                    </label>
                                </div>                                
                            </div>
                            <div class="col-lg-5 col-md-4 col-6">
                                <div class="input-group search">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-addon">
                                        <i class="zmdi zmdi-search"></i>
                                    </span>
                                </div>
                            </div>                                                     
                        </div>
                    </div>
                </div>
            </div>           
        </div>        @if($messages == NULL )
                <h2> no messages </h2>
                @endif
        <div class="row clearfix">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <ul class="mail_list list-group list-unstyled">
                @foreach($messages as $message)
                
                    <li class="list-group-item">
                        <div class="media">
                            <div class="pull-left">                                
                                <div class="controls">
                                  
                                    <a href="javascript:void(0);" class="favourite text-muted hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star-outline"></i></a>
                                </div>
                                <div class="thumb hidden-sm-down m-r-20"> <img src="assets/images/xs/avatar1.jpg" class="rounded-circle" alt=""> </div>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <a href="{{route('user.show', $message->From)}}" class="m-r-10">{{ $message->From_name}}</a>
                                    
                                    <small class="float-right text-muted">{{ $message->created_at}}<i class="zmdi zmdi-attachment-alt"></i> </small>
                                </div>
                                <p class="msg">{{$message->message}}</p>
                            </div>
                        </div>
                    </li>
            @endforeach
        <style>
        
@endsection