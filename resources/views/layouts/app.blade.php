
    <?php use Illuminate\Support\Facades\Auth;
                                    use App\User; ?>
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
    <!---sin bootstrap--><script src="{{ asset('js/app.js') }}" defer></script> 

    <style>  

    .color_diferente{
    color: #802779;
    }

    </style>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/docs.min.js"></script>
    <script src="js/app.js"></script>

    <script src="js/app.js"></script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


        <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 

    <!--bootstrap-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">

    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

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
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                    </li>
                                @endif
                            @else 
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                        



                                
                            
                                    <?php  
                                    
                                
                                    if(  Auth::user()->id !=null){
                                    $id =  Auth::user()->id; 
                                    
                                    
                                    $userb = User::with('roles')->where('id', $id)->first();

                            

                                    
                                    // $role= $userb->roles[0]->name;
                                    $array_roles=$userb->roles->pluck('name');

                                    
                                
                                

                       if( $array_roles->contains('Admin') || $array_roles->contains('Editor')) {
                                                                    
                                                                ?>

                                <a class="dropdown-item" href="{{ url('/newsEdit') }}"
                                                                    onclick="">
                                                                        {{ __('Crea noticia') }}
                                                                    </a>
                                                            <?php
                                                            }}  ?>

                                    

                                      
                                    

                                    <a class="dropdown-item" href="{{ url('/noticias') }}"
                                       onclick="">
                                        {{ __('Mis noticias') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ url('/miarea') }}"
                                       onclick="">
                                        {{ __('Mi área ') }}
                                    </a>


                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>

        </nav>



        
        <main class="py-4">
            @yield('content')
        </main>
    </div>


<!--
</div>

    <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img class="mb-2" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
        <small class="d-block mb-3 text-muted">© 2017-2019</small>
      </div>
      <div class="col-6 col-md">
        <h5>Features</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Cool stuff</a></li>
          <li><a class="text-muted" href="#">Random feature</a></li>
          <li><a class="text-muted" href="#">Team feature</a></li>
          <li><a class="text-muted" href="#">Stuff for developers</a></li>
          <li><a class="text-muted" href="#">Another one</a></li>
          <li><a class="text-muted" href="#">Last time</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Resource</a></li>
          <li><a class="text-muted" href="#">Resource name</a></li>
          <li><a class="text-muted" href="#">Another resource</a></li>
          <li><a class="text-muted" href="#">Final resource</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Contact</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="https://www.linkedin.com/in/ignaciomendz/">Linkedin</a></li>
          <li><a class="text-muted" href="https://twitter.com/nachomndzz">Twitter</a></li>
          <li><a class="text-muted" href="https://sectorf8.com">Ingeniería SectorF8</a></li>
          <li><a class="text-muted" href="#">Terms</a></li>
        </ul>
      </div>
    </div>
  </footer>
-->


</body>
</html>
