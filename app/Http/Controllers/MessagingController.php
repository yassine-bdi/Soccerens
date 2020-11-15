<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use App\Message; 
use Illuminate\Support\Facades\Auth; 
use DB;

class MessagingController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $message = new Message();
        $message->message = $request->input('message'); 
        $message->To = $id; 
        $message->From = Auth::user()->id; 
        $message->save(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function send(Request $request, $id, $name) 
    {
        $message = new Message();
        $message->message = $request->input('message'); 
        $message->To = $id; 
        $message->From = Auth::user()->id; 
        $message->From_name = Auth::user()->name;  
        $message->save(); 
        return $this->inbox();  
    }
    public function inbox() {
        $messages = DB::table('messages')
                ->where('To', Auth::user()->id)
                ->get(); 
        
        return view('users.inbox', ['messages' => $messages]); 
    }
    
}
