@extends('layouts.app')

<style>
    .container {
        text-align: left;
        padding-left: 30%;
    }
</style>

@section('content')


<?php

use App\Http\Controllers\Tag\TagController;
use App\Http\Controllers\User\UserController;

use Illuminate\Support\Facades\Auth;






$Tags = TagController::staticIndex();

?>



<body>

    <style>
        div.hola {
            margin-bottom: 110px;
        }
    </style>

    <div class="container hola">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registra tus datos!') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf


                            <!--<div>-->
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombre" required autocomplete="name" autofocus>

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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email">

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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="new-password">

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
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required autocomplete="new-password">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                                <div class="col-md-5">
                                    <input id="telefono" type="tel" class="form-control @error('name') is-invalid @enderror" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}" pattern="[0-9]{9}" required autocomplete="name" autofocus>

                                </div>
                            </div>



                            <!---puesto--->
                            <!--<div class="form-group row">
                            <label for="perfi_id" class="col-md-4 col-form-label text-md-right">{{ __('Puesto') }}</label>

                       
                           
                            <div class="col-md-5">
                            <div class="input-group">
                            <input id="perfil_id" type="radio" name="perfil_id" class="form-control @error('name') is-invalid @enderror" value="1"> Directivo 

                            <input id="perfil_id" type="radio" name="perfil_id" class="form-control @error('name') is-invalid @enderror" value="2"> Empleado
</div>
</div> </div>-->



                            <!--   <div class="form-group row">
                                <label for="intereses" class="col-md-4 col-form-label text-md-right">{{ __('Intereses:') }}</label>


                                <div> <label><input id='intereses-infor' type="checkbox" name=" intereses[]" value="informatica"> Informática </label><br>

                                <label><input  id='intereses-depor' type="checkbox" name="intereses[]" value="deportes"> Deportes</label><br>

                              <label><input id='intereses-video' type="checkbox" name="intereses[]" value="videojuegos"> Videojuegos</label><br>

                              <label> <input  id='intereses-ocio' type="checkbox" name="intereses[]" value="ocio"> Ocio </label>
                                <label><input  id='intereses-politica' type="checkbox" name="intereses[]" value="política"> Política</label>
                                <label><input  id='intereses-animales' type="checkbox" name="intereses[]" value="animales"> Animales </label>


</div>

                        </div>

-->



                            <?php

                            use App\Http\Controllers\Perfil\PerfilController;

                            $data = PerfilController::staticIndex();

                            ?>

                            <div class="form-group row">
                                <label for="exampleFormControlSelect1" class="col-md-4 col-form-label text-md-right">Puesto:</label>

                                <div class="col-md-6">
                                    <select class="form-control " id="perfil_id" name="perfil_id">


                                        @foreach ($data as $perfil)
                                        <option value="{{$perfil['id']}}">{{$perfil['puesto']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>











                            <div class="form-group row">
                                <label for="temas" class="col-md-4 col-form-label text-md-right">{{ __('Temas que te interesan:') }}</label>

                                <div class="col-md-6">
                                    <select id="example-getting-started" name="multiselect[]" multiple="multiple" required="">
                                        @foreach ($Tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach


                                </div>
                            </div>





                            <div class="form-group row">
                                <label for="temas" class="col-md-4 col-form-label text-md-right">{{ __('Temas que te interesan:') }}</label>

                                <div class="col-md-6">
                                    <select id="example-getting-started" name="multiselect[]" multiple="multiple" required="">
                                        @foreach ($Tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach


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


</body>



<script type="text/javascript">
    $(document).ready(function() {
        $('#example-getting-started').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true,
            maxHeight: 250,
            buttonWidth: '200px',
            allSelectedText: 'Todas seleccionadas...',
        });
    });
</script>





@endsection