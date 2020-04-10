@extends('layouts.app')



@section('content')



<script>
        let nacho=[], emails_ids;
        function borrar_ids(){
            nacho.pop();
            emails_ids = nacho.map(e=>e).join(',')
    console.log(emails_ids);

    document.getElementById('user').value=emails_ids;
        }
    function testBut(){
        var userSelect = document.getElementById('SelectUser');
    var userseleccionado = userSelect.options[userSelect.selectedIndex].value;

    axios.get(`api/users/IdDadoEmail/${userseleccionado}`)  
    .then(response => {

        [response.data].forEach(e=>{
            let y = nacho.filter(f=>f== e.id);
            if(!y.length)    
                nacho.push(e.id);
        });

        console.log(nacho);
        emails_ids = nacho.map(e=>e).join(',')
    console.log(emails_ids);

    document.getElementById('user').value=emails_ids;


    })


    .catch(e => {
        // Podemos mostrar los errores en la consola
        console.log(e);
    })}
    </script>







<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mis datos') }}</div>

                <div class="card-body">
                    

                <?php

use App\Http\Controllers\User\UserController;

use Illuminate\Support\Facades\Auth;

                $dato = Auth::user()->id;

               echo $dato;
                

              $dato= UserController::informacionPorId($dato);
              echo $dato;

            $resultado=  $dato;



                ?>




               <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text"  name="name" value="<?php echo $resultado['name']; ?>"  autofocus>

                               <!-- <input type="text" class="loquesea" value=" <//?php echo $resultado['nombre']; ?>"> -->

                        </div></div>



                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="<?php echo $resultado['email']; ?>" ><!--value="{{ old('email') }}" >-->

                        </div></div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="telefono"  name="telefono" value="<?php echo $resultado['telefono']; ?>"  >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de registro') }}</label>



                        <label for="tlf" class="col-md-4 col-form-label text-md-right"  ><?php echo $resultado['created_at']; ?> </label>




                            </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
