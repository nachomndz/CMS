@extends('layouts.app')

<style>
    .container {
        text-align: left;
        padding-left: 30%;
    }
    
    .separacion {
        margin: 40px;
    }
</style>

@section('content')

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

<?php

use App\Http\Controllers\Tag\TagController;
use App\Http\Controllers\User\UserController;

use Illuminate\Support\Facades\Auth;

         $Tags = TagController::staticIndex();

                ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crea/Borra Tags!') }}</div>

                    <div class="card-body">
                        <form method="POST"  action="{{route('borrarTag')}}">
                            @csrf
                        

                            <div class="form-group row">
                                <label for="temas" class="col-md-4 col-form-label text-md-right">{{ __('Selecciona para borrar:') }}</label>

                                <div class="col-md-6">
                                    <select id="example-getting-started" name="multiselect[]" multiple="multiple" required="">
                                        @foreach ($Tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="separacion">

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        {{ __('Añadir') }}

                                    </button>

                                </div>
                                <div class="separacion">

                                    <button type="submit" class="btn btn-primary btn btn-danger"  >
                                        {{ __('Borrar') }}

                                    </button>
                                </div>

                            </div>


                            </form>

                       <!-- Button trigger modal -->


<!-- Modal -->

<form method="POST" action="{{ route('guardarTag') }}">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crea un tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      
      <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nuevo Tag') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                                </div>
                            </div>


      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cierra</button>
        <button type="submit" class="btn btn-primary">Guarda cambios</button>
      </div>
    </div>
  </div>
</div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection