<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
  
  <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <script src="js/bootstrap.min.js"></script>

   <script src="js/docs.min.js"></script>


   <!--bootstrap-->
  <!-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet">
-->
   
   <link href="views/assets/css/bootstrap.css" rel="stylesheet">
        <link href="views/assets/css/landing-page.min.css" rel="stylesheet">


        <!-- Styles -->
        <style>
           html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            html,body {
    font-family: Rubik,Arial,sans-serif;
    font-weight: 400;
    font-size: 1rem;
    overflow-x: hidden;
    color: #607289;
}

h5 {
    font-size: 1rem;
    line-height: 1.375;
  font-family: Rubik,Arial,sans-serif;
    font-weight: 500;
    color: #030929;
}

a {
  color: #818494;
  font-weight: 500;
  text-decoration: none;
  background-color: transparent;
}

a:hover {
  color: #007bff;
  text-decoration: none;
}

footer {
  background:   #fff;
}

#carrusel {
  width: 500px;
  height: 500px;
  margin: auto;
}



        </style>
    </head>
    
    
  <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registro</a>
                        @endif
                    @endauth
                </div>
            @endif

              <!--
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>


-->

        <div class="container" id="carrusel">
  <h2>Carousel Example</h2>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
   
    <div class="carousel-inner">
      <div class="item active">
        <img src="la.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="chicago.jpg" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="ny.jpg" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<!--Google +-->
<a class="btn-floating btn-lg btn-gplus" type="button" role="button"><i class="fab fa-google-plus-g"></i></a>
<!--Linkedin-->
<a class="btn-floating btn-lg btn-li" type="button" role="button"><i class="fab fa-linkedin-in"></i></a>

<!--Email-->
<a class="btn-floating btn-lg btn-email" type="button" role="button"><i class="fas fa-envelope"></i></a>

<!--WhatsApp-->
<a class="btn-floating btn-lg btn-whatsapp" type="button" role="button"><i class="fab fa-whatsapp"></i></a>
    <i class="icon-facebook-circle"></i>

</body>
</html>