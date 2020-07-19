@extends('layouts.app')




<style>
  
  
footer{
  width: 100vw;
  position: absolute;
}

.site-footer{
  width:100vw;
  position: absolute;
}
  
  </style>

@section('content')




<script>
  function borrarUsuario(id) {





    if (window.confirm("¿Estás seguro de borrar este usuario?")) {

      axios.delete(`api/users/${id}`)
        .then(respuesta_del_servidor => {
          //console.log(respuesta_del_servidor.data)
          location.reload();

        })

    }


  }

  function mostrarTagsUsuario(id) {

    axios.get(`get-tags/${id}`)


      .then(function(response) {

        console.log(response.data);
        console.log(response.data.length);

        var str1 = "Sus tags son: ";
        /* for (paso = 0; paso < response.data.length; paso++) {
     
        var str1=str1.concat(response.data[paso]," , ")
      
    
    }*/


        var str1 = str1.concat(response.data.join(", "));

        console.log(str1);
        alert(str1);
      })





  }
</script>




</br>


<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;

//$id= Auth::user()->id;
//$usuarios=UserController::allUsers();


$usuarios = App\User::with('perfil')->get();
?>


<table id="userss" class="table table-striped table-bordered table condensed table-hover table-responsive ">
  <thead>

    <!--  <th>Seleccionar</th> -->
    <th>Id</th>
    <th>Nombre</th>
    <th>E-mail</th>
    <th>Telefono</th>
    <th>Puesto</th>
    <th>Acción</th>

  </thead>

@foreach ($usuarios as $user)
  <tr>


    <th scope="row">{{$user->id}} </th>


    <td> {{$user->name}}</td>

    <td> {{$user->email}}</td>
    <td> {{$user->telefono}}</td>

    <td> {{$user->perfil->puesto}}</td>

    <td> <button type="button" id="botonValor" onclick="borrarUsuario({{$user->id}})" value="{{$user->id}}"> <img src="/assets/icons-main/icons/trash-fill.svg" /> </button>
      <button type="button" onclick="mostrarTagsUsuario({{$user->id}})"> <img src="/assets/icons-main/icons/eye-fill.svg" /> </button>

    </td>



  </tr>

  @endforeach


</table>




@endsection