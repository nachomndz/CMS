@extends('layouts.app')
<title>nachomndzTFG</title>
<script>
   
   
   
   function vermas(id) {
       if (id == "mas") {
           document.getElementById("desplegar").style.display = "block";
           document.getElementById("mas").style.display = "none";
       } else {
           document.getElementById("desplegar").style.display = "none";
           document.getElementById("mas").style.display = "inline";
       }
   }
</script>
<style>
   div.noticia {
   width: 100%;
   float: left;
   border: 1px solid #e1e1e1;
   transition: all .3s ease;
   }
   @media only screen and (min-width:768px) {
   div.noticia {
   width: 40%;
   /*padding-top: 5%;*/
   /** aumento de la tarjeta más progresivo */
   transition: all .3s ease;
   border: 1px solid #e1e1e1;
   padding-top: 20px;
   min-height: 240px;
   margin-bottom: 80px;
   margin-right: 60px;
   }
   }
   div.noticia:hover {
   background-color: #e1e1e1;
   /** aumenta la tarjeta al pasar el cursor */
   -webkit-transform: scale(1.08);
   }
   div.titulo {
   text-align: center;
   color: #fe4918;
   text-transform: uppercase;
   font-weight: bold;
   }
   p.texto {
   text-align: center;
   }
   p.leermas {
   text-align: center;
   }
   div.autor {
   text-align: center;
   }
   div.comienza {
   text-align: center;
   }
   body {}


   button.hola{
    justify-content: center;
   }
</style>
<body>
   @section('content') @if (Route::has('login')) @auth @else
   <a href="{{ route('login') }}">Login</a> @if (Route::has('register'))
   <a href="{{ route('register') }}">Registro</a> @endif @endauth @endif
   <?php
      use App\Http\Controllers\User\UserController;
      
      use Illuminate\Support\Facades\Auth;
      
      $id = Auth::user()->id;
      $dato = UserController::getMisContenidos($id);
      
      ?>
   <script>
      let datos = [];
      let visible = false;
      let id_user = <?php echo $id; ?>;
      axios.get(`get-contenidos/${id_user}`)
          .then(res => {
              res.data.forEach(e => {
                  e.forEach(i => {
                      $('#listado').append(dibujarCardVisible(i.id, i.titulo, i.texto, i.autor, i.comienza, i.path));
                  })
      
              })
          })
      
      function ocultarNoticia() {
      
          console.log(id);
      
      
          if (window.confirm("¿Estás seguro de ocultar esta noticia?")) {
      
              axios.post(`./ocultar-noticia`, {
                      'id': id
                  })
                  .then(respuesta_del_servidor => {
                      // console.log(respuesta_del_servidor.data)
                      location.reload();
      
      
      
                  })
      
          }
      
      
      }
      
      function mostrarNoticia() {
      
          console.log(id);
      
      
          if (window.confirm("¿Estás seguro de mostrar esta noticia?")) {
      
              axios.post(`./mostrar-noticia`, {
                      'id': id
                  })
                  .then(respuesta_del_servidor => {
                      // console.log(respuesta_del_servidor.data)
                      location.reload();
      
      
      
                  })
      
          }
      
      
      }
      
      
      
      function dibujarCardVisible(id, titulo, texto, autor, comienza, path) {
      
          console.log(path);
      
          if (path != null) {
              hola = path.slice(7, path.length);
      
      
              console.log(hola)
              path = hola;
      
              ;
      
          }
      
      let card = `<div class="noticia">  
      
      
      <center><img class="imagen" src="storage/${path}" alt="foto"  height="200">  </center>
        <div class="titulo">Título: ${titulo} </div> </br> 
      
       <p class="leermas"> <a href="#" id="mas" onclick="vermas('mas')">leer más</a> </p>
                    
       
           <p id="desplegar" class="texto" style="display:none"> <img src="/assets/icons-main/icons/file-text.svg" /> Texto: ${texto}  </br>
      
           <a href="#" id="menos" onclick="vermas('menos')">leer menos</a></p>
      
              <div class="autor"><img src="/assets/icons-main/icons/file-person.svg" /> Autor: ${autor} </div> </br>
                     <div class="comienza"> <img src="/assets/icons-main/icons/calendar-check.svg" />  Comienza: ${comienza} </div> 
                     
                     
                     <button href="#" type="button" onclick="ocultarNoticia()  class="btn btn-primary"> <img src="/assets/icons-main/icons/eye-fill.svg"  /> Mostrar noticia</button>

                     </div> `;
          return card;
      }


      
      
      function dibujarCardOcultas(id, titulo, texto, autor, comienza, path) {
          let card = `<div class="noticia">  
      
      
      <center><img class="imagen" src="storage/${path}" alt="foto"  height="200">  </center>
        <div class="titulo">Título: ${titulo} </div> </br> 
      
       <p class="leermas"> <a href="#" id="mas" onclick="vermas('mas')">leer más</a> </p>
                    
           <p id="desplegar" class="texto" style="display:none"> <img src="/assets/icons-main/icons/file-text.svg" /> Texto: ${texto}  </br>
      
           <a href="#" id="menos" onclick="vermas('menos')">leer menos</a></p>
      
              <div class="autor"><img src="/assets/icons-main/icons/file-person.svg" /> Autor: ${autor} </div> </br>
                     <div class="comienza"> <img src="/assets/icons-main/icons/calendar-check.svg" />  Comienza: ${comienza} </div> 
                     
                     
                     <button href="#" type="button" onclick="mostrarNoticia()  class="btn btn-primary"> <img src="/assets/icons-main/icons/eye-fill.svg"  /> Mostrar noticia</button>

                     </div> `;
          return card;
      }
      
      
      
      function mostrarOcultas() {
      
          visible = !visible;
          if (visible) {
              axios.post(`./filtrar-ocultas`)
                  .then(respuesta_del_servidor => {
                      let datos = [];
                      datos = respuesta_del_servidor.data;
                      $('#listado').empty();
                      datos.forEach(e => {
                          console.log(e);
      
      
                          $('#listado').append(dibujarCardOcultas(e.id,e.titulo, e.texto,e.autor,e.comienza,e.path));
      
                      })
                  })
              //return;
          }
      
      
      
          //$('#listado').empty();
          else {
      
              $('#listado').empty();
      
              let visible = false;
              let id_user = <?php echo $id; ?>;
              axios.get(`get-contenidos/${id_user}`)
                  .then(res => {
                      res.data.forEach(e => {
                          e.forEach(i => {
                              $('#listado').append(dibujarCardVisible(i.id,i.titulo, i.texto,i.autor,i.comienza,i.path));
                          })
      
                      })
                  })
      
          }
      
      
      
      
      
      
      }
   </script>
   <div class="container">
      <div class="row">
         <div class="col-1">
            Filtrar:
         </div>
         <div class="custom-control custom-switch col-2">
            <input type="checkbox" class="custom-control-input" id="customSwitch1" onclick="mostrarOcultas()">
            <label class="custom-control-label" for="customSwitch1">Ocultas(ON)/Visibles(OFF)</label>
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