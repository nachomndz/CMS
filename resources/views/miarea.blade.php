








 @extends('layouts.app')
@section('content')


<?php

use App\Http\Controllers\Tag\TagController;
use App\Http\Controllers\User\UserController;

use Illuminate\Support\Facades\Auth;

                $dato = Auth::user()->id;

                $tags_del_usuario=UserController::mostrarTagsUsuario($dato);
                

              $dato= UserController::informacionPorId($dato);

            $resultado=  $dato;


           

         $Tags = TagController::staticIndex();

         

                ?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mis datos') }}</div>

                <div class="card-body">
                    

            


                @csrf
               <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text"  name="name" value="<?php echo $resultado['name']; ?>"  autofocus disabled>

                               <!-- <input type="text" class="loquesea" value=" <//?php echo $resultado['nombre']; ?>"> -->

                        </div></div>



                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail:') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="<?php echo $resultado['email']; ?>" disabled><!--value="{{ old('email') }}" >-->

                        </div></div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono:') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="telefono"  name="telefono" value="<?php echo $resultado['telefono']; ?>"  disabled>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                        <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de registro:') }}</label>

                        <div class="col-md-6">
                        <label for="creado" class=" col-form-label text-md-right"  ><?php echo $resultado['created_at']; ?> </label>

                            </div>
                        </div>
                              





                          <!--  <div class="form-group row">
                            <label for="temas" class="col-md-4 col-form-label text-md-right">{{ __('Tus temas:') }}</label>
                 
                            <div class="col-md-6">
                            <select id="example-getting-started"  name="multiselect[]" multiple="multiple" required="">
                        @foreach ($Tags as $tag)
                         <option value="{{$tag->name}}">{{$tag->name}}</option>
                            @endforeach


                                </div>
                            </div>

            
                    </select>-->

                    <div class="form-group row">
                    <label for="temas" class="col-md-4 col-form-label text-md-right">{{ __('Tus tags:') }}</label>


                    <div class="col-md-6">
  
                        <label for="tustags" class=" col-form-label text-md-right"  ><?php 
                        
                        //for($i=0; $i<count($tags_del_usuario); $i++){

                        
                        echo implode ( $tags_del_usuario , ', ');// +","; }
                        
                        ?> </label>

                            </div>
</div>






                            <script type="text/javascript">
           
            $(document).ready(function() {
                $('#example-getting-started').multiselect({
                    includeSelectAllOption: true,
                    enableFiltering: true,
                    maxHeight: 250,
                    buttonWidth: '200px',
                    allSelectedText: 'Todas seleccionadas..',
                });
            });
        </script>











                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
