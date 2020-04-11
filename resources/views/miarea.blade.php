
@extends('layouts.app')




@section('content')



<!-- -->
 <!-- ends -->
  <!-- jQuery -->
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>  -->
  <!-- Bootstrap JavaScript -->
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script> -->
 <!-- <script src="../js/jquery.multi-select.js"></script>
  <script type="text/javascript">
  // run pre selected options
  $('#pre-selected-options').multiSelect();   -->
 <!--</script>   -->
    <!-- Include Twitter Bootstrap and jQuery: -->

    
   <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>  -->
  <!--  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
 
  <script type="text/javascript" src="js/bootstrap.min.js"></script> 

  <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>

  <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
   


  <link href="path/to/multiselect.css" media="screen" rel="stylesheet" type="text/css">
-->


<script>
$(document).ready(function() {
  $('#months').multiselect();
});  </script>

<!--
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



-->



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
