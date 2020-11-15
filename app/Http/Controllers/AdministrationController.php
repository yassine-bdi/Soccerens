<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use App\Post; 
use App\Message; 
use DB; 

class AdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
          return view('admin.admin', [
            'users' => User::paginate(10), 
            'posts' => Post::all()
        ]
     
    ); 
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('users')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('title', 'like', '%'.$query.'%')
         
         ->orderBy('birth_date', 'desc')
         ->get();
         
         
      }
      else
      {
       $data = DB::table('users')
         ->orderBy('id', 'desc')
         ->get();
         $posts = DB::table('posts')
         ->orderBy('id','desc')
         ->get(); 
      }
      $total_row = $data->count();
      $total_posts = $posts->count(); 
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->name.'</td>
         <td>'.$row->title.'</td>
         <td><a href="' .  route('userconsult', [ 'id' => $row->id] )  . '"> consult user </a></td> 
        
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row,
       'total_posts' => $total_posts
      );

      echo json_encode($data);
     }
    }

    function fetch(Request $request)
    {
     if($request->ajax())
     {
      $query = $request->get('query');
      $data = DB::table('users')
      ->where('name', 'like', '%'.$query.'%')
      ->orWhere('title', 'like', '%'.$query.'%')
      
      ->orderBy('birth_date', 'desc')
      ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative; width:680px>';
      foreach($data as $row)
      {
       
       $output .= '
       <li style="width:680px"><a href="' .  route('user.show',$row->id )  . '">'.$row->name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }
    public function userconsult($id) {
        return view('admin.userconsult', [
            'user' => User::find($id),
            'posts' => Post::where('user_id', $id)->count(), 
            'sent' => Message::where('From', $id)->count(), 
            'received' => Message::where('To', $id)->count()
           
        ]); 
    }
}
