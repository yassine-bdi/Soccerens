@extends('layouts.app')
@section('content')
     
    <head >
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
    <div class="container">
       
    
        <h3 align="center">Hello dear {{ Auth::user()->name }} </h3>
        <h4 align="center">USERS ADMINISTRATION</h4><br>
        <div class="panel panel-default">
         <div class="panel-heading"></div>
         <div class="panel-body">
          <div class="form-group">
           <input type="text" name="search" id="search" class="form-control" placeholder="Search Users.." />
          </div>
          <div class="table-responsive">
              <div align="center" class="inline">
           <h5 >Number of users : <span id="total_records"></span></h5>
           <h5 >Number of posts : <span id="total_posts"></span></h5>
              </div>
           <table class="table table-striped table-bordered">
            <thead>
             <tr>
              <th> Name</th>
              <th>title</th>
              <th>Actions</th>
             
             </tr>
            </thead>
            <tbody>
     
            </tbody>
           </table>
          </div>
         </div>    
        </div>
       </div>
      </body>
     </html>
     
    
   
 <script>
     $(document).ready(function(){
     
      fetch_customer_data();
     
      function fetch_customer_data(query = '')
      {
       $.ajax({
        url:"{{ route('live_search.action') }}",
        method:'GET',
        data:{query:query},
        dataType:'json',
        success:function(data)
        {
         $('tbody').html(data.table_data);
         $('#total_records').text(data.total_data);
         $('#total_posts').text(data.total_posts); 
        }
       })
      }
     
      $(document).on('keyup', '#search', function(){
       var query = $(this).val();
       fetch_customer_data(query);
      });
     });
     </script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
@endsection
