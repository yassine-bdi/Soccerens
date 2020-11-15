<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
     <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" defer></script>
     <script src="{{ asset('js/slick.min.js') }}" defer></script>
     <script src="https://kit.fontawesome.com/ae89c2e992.js" crossorigin="anonymous"></script>
 
 
 
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
 
     
 
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet"> 
    <!-- Styles -->
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
</head>
<body>
  <img src="{{ asset('20200823_001116.png') }}"  class="float-right py-5 px-5" style="width:350px;   ">
<style>
    body {
  background: url(../stadium_fans.jpg);
  background-blend-mode:overlay; 
  background-size:cover; 
  background-repeat: no-repeat; 
  font-family: Poppins;
  
  
}

</style>

@yield('content')