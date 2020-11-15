<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" defer></script>
    <script src="{{ asset('js/slick.min.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/ae89c2e992.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">

    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-success shadow-sm site-navigation sticky-top ">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div >
                  <input type="text" name="country_name" id="country_name" class="form-control input-lg" placeholder="Search.. " style="width:680px" />
                  <div id="countryList">
                  </div>
                 </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))0
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  @if( auth::user()->profile_image != NULL ) 
            
                                  <img src="{{ asset('storage/' . Auth::user()->profile_image) }}"  style="margin-left: 80px; height: 30px;   border-radius: 100%" class="cars-img-top">
                                  @else
                                  <img src="{{ asset('defaultavatar.jpg') }}"  style="margin-left: 80px; height:30px;   border-radius: 100%" class="cars-img-top">
                                    
                                    @endif<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.show', Auth::user()->id) }}"> profile </a>
                                    <a class="dropdown-item" href="{{ route('inbox')}}"> inbox </a>
                                    <a class="dropdown-item" href="{{ route('user.edit', Auth::user()->id) }}"> profile settings </a>
                                    @if(Auth::user()->role == 'admin') 
                                    <a class="dropdown-item" href="{{ route('admin')}}"> administration </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-1">
            @yield('content')
        </main>
    </div>
    <script>
      $(document).ready(function(){
      
       $('#country_name').keyup(function(){ 
              var query = $(this).val();
              if(query != '')
              {
               var _token = $('input[name="_token"]').val();
               $.ajax({
                url:"{{ route('autocomplete.fetch') }}",
                method:"GET",
                data:{query:query, _token:_token},
                success:function(data){
                 $('#countryList').fadeIn();  
                          $('#countryList').html(data);
                }
               });
              }
          });
      
          $(document).on('click', 'li', function(){  
              $('#country_name').val($(this).text());  
              $('#countryList').fadeOut();  
          });  
      
      });
      </script>
      
</body>
<div>
<footer class="site-footer border-top pt-5 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="mb-5">
            <h3 class="footer-heading mb-4">About Soccerens</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe pariatur reprehenderit vero atque, consequatur id ratione, et non dignissimos culpa? Ut veritatis, quos illum totam quis blanditiis, minima minus odio!</p>
          </div>

          <div class="mb-5">
            <h3 class="footer-heading mb-4">Recent Blog</h3>
            <div class="block-25">
              <ul class="list-unstyled">
                <li class="mb-3">
                  <a href="#" class="d-flex">
                    <figure class="image mr-4">
                      <img src="images/img_1.jpg" alt="" class="img-fluid">
                    </figure>
                    <div class="text">
                      <h3 class="heading font-weight-light">Lorem ipsum dolor sit amet consectetur elit</h3>
                    </div>
                  </a>
                </li>
                <li class="mb-3">
                  <a href="#" class="d-flex">
                    <figure class="image mr-4">
                      <img src="images/img_1.jpg" alt="" class="img-fluid">
                    </figure>
                    <div class="text">
                      <h3 class="heading font-weight-light">Lorem ipsum dolor sit amet consectetur elit</h3>
                    </div>
                  </a>
                </li>
                <li class="mb-3">
                  <a href="#" class="d-flex">
                    <figure class="image mr-4">
                      <img src="images/img_1.jpg" alt="" class="img-fluid">
                    </figure>
                    <div class="text">
                      <h3 class="heading font-weight-light">Lorem ipsum dolor sit amet consectetur elit</h3>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          
        </div>
        <div class="col-lg-4 mb-5 mb-lg-0">
          <div class="row mb-5">
            <div class="col-md-12">
              <h3 class="footer-heading mb-4">Quick Menu</h3>
            </div>
            <div class="col-md-6 col-lg-6">
              <ul class="list-unstyled">
                <li><a href="#">Home</a></li>
                <li><a href="#">Matches</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Team</a></li>
              </ul>
            </div>
            <div class="col-md-6 col-lg-6">
              <ul class="list-unstyled">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Membership</a></li>
              </ul>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <h3 class="footer-heading mb-4">Follow Us</h3>

              <div>
                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-4 mb-5 mb-lg-0">
          <div class="mb-5">
           

          </div>

        

        </div>
        
      </div>
      <div class="row pt-4 mt-4 text-center">
        <div class="col-md-12">
          <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright Soccerens &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
        
      </div>
    </div>
  </footer>
</div>

</html>
