
 
@extends('layouts.app')

@section('content')

 <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 


   

    <script>
        var j = jQuery.noConflict();
        j(function() {
            j("#datepicker").datepicker();
        });
    </script>


<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crea la noticia') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf


                            <div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Titulo:') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Foto:') }}</label>

                                    <div class="col-md-6">
                                        <input id="foto" type="foto" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>






                                <div class="form-group row ">
                                    <label for="exampleFormControlTextarea1" class="col-md-4 col-form-label text-md-right">Texto:</label>

                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>

                            </div>


                            <div class="form-group row">
                                <label for="exampleFormControlSelect1" class="col-md-4 col-form-label text-md-right">Escoge la categoría de la noticia:</label>
                                <select class="form-control " id="exampleFormControlSelect1">
                                    <option>Ocio</option>
                                    <option>Deportes</option>
                                    <option>Animales</option>
                                    <option>Política</option>
                                    <option>Informática</option>
                                    <option>Videojuegos</option>
                                </select>
                            </div>


                            <div>
                                <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Id del usuario/all:') }}</label>
                            <div class="col-md-6">
                                        <input id="user" type="text"  name="user" value="{{ old('name') }}"  autofocus>
                 

    </div>

    </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Caducidad:') }}</label>
                                <input type="text" name="date" id="datepicker">


                            </div>

                            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                            <button type="submit" class="btn btn-primary">
                                    {{ __('Crear') }}


                            </button>

                    </div>
                </div>

                </form>


            </div>
        </div>
    </div>
    </div>
    </div>



   

    








  

</body>

@endsection