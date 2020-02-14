@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registra tus datos!') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-5">
                                <input id="telefono" type="tel" class="form-control @error('name') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="name" autofocus>

</div> </div>


                        <div class="form-group row">
                                <label for="intereses" class="col-md-4 col-form-label text-md-right">{{ __('Intereses:') }}</label>


                                <div> <label><input type="checkbox" name="cb-informatica" value="gusta"> Informática </label><br>

                                <label><input type="checkbox" name="cb-deportes" value="gusta"> Deportes</label><br>

<label><input type="checkbox" name="cb-videojuegos" value="gusta"> Videojuegos</label><br>

<label> <input type="checkbox" name="cb-ocio" value="gusta"> Ocio </label>
<label><input type="checkbox" name="cb-noticias" value="gusta"> Noticias </label>
<label><input type="checkbox" name="cb-animales" value="gusta"> Animales </label>


</div>

                        </div>


              

                    
                        

</div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                            <button type="submit" class="btn btn-primary">
                                    {{ __('Regístrate') }}


                                </button>

                            </div>
                        </div>

                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
