
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
                $dato=UserController::getMisContenidos($id);

?>


<script>
    let datos=[];
    let id_user = <?php echo $id; ?>;
    axios.get(`get-contenidos/${id_user}`)
    .then(res=>{
        res.data.forEach(e=>{
            $('#listado').append(dibujarCard(e.microcontenidos.map(i=>i.titulo).join('')));
        })
    })

function ocultarNoticia(id) {

    console.log(id);

  
  if (window.confirm("¿Estás seguro de ocultar esta noticia?")) { 
 



axios.post(`./ocultar-noticia`, {'id':id})
.then(respuesta_del_servidor=>{
 // console.log(respuesta_del_servidor.data)
  location.reload();


  
})

}


}

function dibujarCard(titulo){
    let card = `<div class="col-4 mt-1">
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">${titulo}</h5>
                <p class="card-text"></p>

                <button href="#" type="button" onclick="ocultarNoticia()" class="btn btn-primary"> <img src="/assets/icons-main/icons/eye-slash-fill.svg"  /> Ocultar noticia</button>
            </div>
        </div>`;
        return card;
}

function mostrarOcultas() {


axios.post(`./filtrar-ocultas`)
.then(respuesta_del_servidor=>{
    let datos=[];
    datos = respuesta_del_servidor.data;
    datos.forEach(e=>{
        console.log(e);
        $('#listado').append(dibujarCard(e.microcontenidos.map(i=>i.titulo).join('')));

    })
// console.log(respuesta_del_servidor.data)
//location.reload();



})




}



</script>













        <div class="container">


        <div class="row">


<div class="col-1">
Filtrar:
</div>

<div class="custom-control custom-switch col-2">
  <input type="checkbox" class="custom-control-input" id="customSwitch1" onclick="mostrarOcultas()">
  <label class="custom-control-label" for="customSwitch1"  >Ocultas(ON)/Visibles(OFF)</label>
</div>


<!--
<div class="custom-control custom-switch col-3">
  <input type="checkbox" class="custom-control-input" id="customSwitch1">
  <label class="custom-control-label" for="customSwitch1"></label>
</div>

-->

        </div>


</br>
            <div class="row">

            
<div id="listado">
    
</div>

    

        
    </div>




            </div>
        </div>

</body>

@endsection