<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
 

  <!--probando-->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
  
  
  <title>nachomndzTFG</title>


   

   <link href="{{ asset('css/landing-page.css') }}" rel="stylesheet">



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

#tarjeta {
    width:400px;
    height:200x;
    margin: auto;
}


        </style>
   

</head>

<body>



<!--<div class="flex-center position-ref full-height">
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
            @endif-->


           <ul class="nav nav-tabs">

 
  <li class="nav-item">

  @if (Route::has('login'))
                
                    @auth
                        <a href="{{ url('/home') }}">Volver</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registro</a>
                        @endif
                    @endauth
            @endif
  </li>


  
</body>

