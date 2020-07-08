<?php use Illuminate\Support\Facades\Auth;
                                    use App\User; ?>

    <title>{{ config('app.name', 'Laravel') }}</title>

   

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>



 
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
                            @endif @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

                                        <a class="dropdown-item" href="{{ url('/newsEdit') }}" onclick="">
                                                                        {{ __('Contenido directo') }}
                                                                    </a>


                                                                    <a class="dropdown-item" href="{{ url('/newsTag') }}" onclick="">
                                        {{ __('Contenido por tag') }}
                                    </a>



                                    <a class="dropdown-item" href="{{ url('/tagsEditor') }}" onclick="">
                                        {{ __('Crear/Borrar tags') }}
                                    </a>


                                    <a class="dropdown-item" href="{{ url('/gestorUsuarios') }}" onclick="">
                                        {{ __('Gestionar Usuarios') }}
                                    </a>


                                        <?php
                                                            }}  ?>

                                            <a class="dropdown-item" href="{{ url('/noticias') }}" onclick="">
                                        {{ __('Mis noticias') }}
                                    </a>

                                            <a class="dropdown-item" href="{{ url('/miarea') }}" onclick="">
                                        {{ __('Mi área ') }}
                                    </a>

                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>

            </nav>



                                                    


            <script type="text/javascript" src="{{ asset('js/bootstrap-multiselect.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/bootstrap-multiselect.css')}}" type="text/css" />


        <link rel="stylesheet" href="{{ asset('css/style-footer.css')}}" type="text/css">


            <main class="py-4 content">
                @yield('content')
                
            </main>
        </div>










        <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Final project title</h3>
                        <p>Microcontents Management System and Notifications from External and Independent Projects</p>
                    </div>
                    <div class="col item social">
                        <a href="">
                    <i class="icon ion-social-facebook"></i></a>
                    <a href="https://twitter.com/nachomndzz"><i class="icon ion-social-twitter">

                    </i></a><a href="https://www.linkedin.com/in/ignaciomendz/"><i class="icon ion-social-linkedin"></i></a>
                    <a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">Ignacio mendez © 2020</p>
            </div>
        </footer>
    </div>
                                                        




    </body>



