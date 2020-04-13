
@extends('layouts.app')

<title>nachomndzTFG</title>

<body>

    @section('content') @if (Route::has('login')) @auth @else
    <a href="{{ route('login') }}">Login</a> @if (Route::has('register'))
    <a href="{{ route('register') }}">Registro</a> @endif @endauth @endif

    <?php 

           use App\Http\Controllers\User\UserController;
           use Illuminate\Support\Facades\Auth;

           $id= Auth::user()->id;
                $dato=UserController::misContenidos($id);

?>
        <div class="container">
            <div class="row">

                @foreach ($dato as $d)
                <div class="col-4 mt-1">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$d->titulo}} </h5>
                            <p class="card-text">{{$d->texto}}</p>

                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>

</body>

@endsection