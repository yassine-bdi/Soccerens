<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Intervention\Image\Facades\Image; 
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('users.show', [
            'user' => User::find($id) 
        
        
        ]); 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('users.edit', [
            'user' => User::find($id) ,
        
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $request->validate([
            'tilte' => 'max:40',
            'about' => 'max:250',
            'social' => 'max:200'
              ]);
        $user = User::find($user); 
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->about = $request->input('about');
        $user->title = $request->input('title');
       
        $user->role = $request->input('role'); 
        $user->country = $request->input('country');
        $user->social = $request->input('social');
        $user->profile_image = $request->input('image');
        if($request->has('image') ) {
            $request->validate([
                'image' => 'file|image|max:5000'
                  ]);
          
            $user->profile_image= request()->image->store('uploads','public');  
             $image = Image::make(public_path('storage/' . $user->profile_image))->fit(300,300); 
             $image->save(); 
        } else {
            $user->profile_image= $user->profile_image; 
        }
       
        if($request->has('cover') ) {
            $request->validate([
                'cover' => 'file|image|max:5000'  
                  ]);
          
            $user->cover_image= request()->cover->store('uploads','public');  
             $image = Image::make(public_path('storage/' . $user->cover_image))->fit(1200,500); 
             $image->save(); 
        }
       
        
        
        $user->save();

        $request->session()->flash('statut','profile updated succefuly'); 
        return UserController::show(Auth::user()->id );

        
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        if(Auth::user()->role == 'admin') {
           
        $user = User::find($id);
        $user->delete();
        $request->session()->flash('statut','user was deleted succefuly'); 
         return view('admin.admin'); 
        }
        else {
            $user = User::find($id);
            $user->delete();
            $request->session()->flash('statut','user was deleted succefuly'); 
            return view('auth.login'); 
        }
    }
    public function settings($id)
    {
        return view('users.settings', [
            'user' => User::find($id) ,
        
        ]); 
    }
    public function change_password(Request $request, $id) {
        $user = User::find($id); 
        $user->password = $request->input('password'); 
        $user->save(); 
        $request->session()->flash('statut','password updated succefuly'); 
        return route('home'); 
    }
    
}
