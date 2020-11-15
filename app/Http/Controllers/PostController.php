<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\User; 
use App\Post; 
use App\Comment; 
use App\Like; 
use App\Http\Controllers\UserController; 
use Intervention\Image\Facades\Image; 

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|min:20|max:6000', 
            
    
              ]);
    
    
            $post = new Post();
            $post->body = $request->input('body');
            
            $post->user_id = Auth::user()->id;
            
            if($request->has('image')) {
                $request->validate([
                    'image' => 'file|image|max:5000'
                      ]);
                      $post->image= request()->image->store('uploads','public');  
                      $image = Image::make(public_path('storage/' . $post->image))->fit(400,400); 
                      $image->save(); 
            }
            
    
            $post->save();
            $request->session()->flash('statut','post added succefuly'); 
            $usrcont = new UserController; 
            return $usrcont->show(Auth::user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show', [
            'posts' => Post::find($id) ,
             'comments' =>  Post::find($id)->comments
                  
        ]);
        $comments = Post::find($id)->comments; 
          return $comments; 
     
        }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id); 
        return view('posts.edit', ['posts' => $post]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id); 
        $post->body = $request->input('body');
        if($request->has('image')) {
            $request->validate([
                'image' => 'file|image|max:5000'
                  ]);
            $post->image= request()->image->store('uploads','public');  
        }
        
        
         
        $post->save();

        $request->session()->flash('statut','post updated succefuly'); 
        $usrcont = new UserController; 
        return $usrcont->show(Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $posts = Post::find($id);
        $posts->delete();
        $request->session()->flash('statut','post was deleted succefuly'); 
        $usrcont = new UserController; 
        return $usrcont->show(Auth::user()->id);
    }
    public function addcomment(Request $request,$id) 
    { 
      
        $comment = new Comment(); 
        $comment->body = $request->input('body');  
    
        if($request->has('image')) {
            $request->validate([
                'image' => 'file|image|max:5000'
                  ]);
            $comment->attachement= request()->image->store('uploads','public');  
        }
        
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id; 
        $comment->save(); 
        $posts = Post::find($id); 
        return view('posts.show', [ 'posts' => $posts , ] ); 
    }
    public function addlike(Request $request,$id) 
    { 
      
        $like = new Like();
        $like->user_id = Auth::user()->id;
        $like->post_id = $id; 
        $like->save(); 
        $posts = Post::find($id); 
        return view('posts.show', [ 'posts' => $posts , ] ); 
    
    }
}
