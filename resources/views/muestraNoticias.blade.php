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
        margin-bottom: 65px;
        min-height: 240px;
        min-width: 500px;
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
        margin-bottom:10px;
    }

    body {}


    a.hola {
        justify-content: center;
    }
</style>

<body>
    @section('content')

    <script>
        let visible = true;
        axios.get(`./get-contenidos/1`)
            .then(res => {
                console.log(res.data);
                res.data.forEach(e => {
                    $('#listado').append(dibujarCard(e));
                })
            }).catch(e => console.log(e))
          // checkedCheckbox();


        /*oculta noticia especifica*/
        function ocultarNoticia(id) {

            console.log(id);
            if (window.confirm("¿Estás seguro de ocultar esta noticia?")) {

                axios.post(`./ocultar-noticia`, {
                        'id': id
                    })
                    .then(respuesta_del_servidor => {
                        // console.log(respuesta_del_servidor.data)
                        checkedCheckbox();
                        
                        //location.reload();

                       mostrarOcultas();
                    })
            }
        }

        /*muestra noticia especifica*/
        function mostrarNoticia(id) {

            console.log(id);
            if (window.confirm("¿Estás seguro de mostrar esta noticia?")) {

                axios.post(`./mostrar-noticia`, {
                        'id': id
                    })
                    .then(respuesta_del_servidor => {
                        // console.log(respuesta_del_servidor.data)
                        checkedCheckbox();
                       // location.reload();
                   
                      mostrarOcultas();
                    

                    })
            }
        }

        function checkedCheckbox(booleano){
            let bool=booleano;
            $('#customSwitch1').prop('checked', bool);
        }

        function dibujarCard(objeto) {

            /*if (objeto.path != null) {
              hola = objeto.path.slice(7, objeto.path.length);
      
      
              console.log(hola);
              path = hola;
      
              
      
          }

        */

         //   let btn_show = `<a href="#" class="btn btn-primary " onclick="mostrarNoticia(${objeto.id})"  >Mostrar</a>`
          //  let btn_hidden = `<a href="#" class="btn btn-light " onclick="ocultarNoticia(${objeto.id})"    >Ocultar</a>`


            let btn_show = `    <center><button href="#" type="button" onclick="mostrarNoticia(${objeto.id})"  class="btn btn-primary"> <img src="/assets/icons-main/icons/eye-fill.svg"  /> Mostrar noticia</button>    </center>`
            let btn_hidden = `    <center><button href="#" type="button" onclick="ocultarNoticia(${objeto.id})"  class="btn btn-primary"> <img src="/assets/icons-main/icons/eye-slash-fill.svg"  /> Ocultar noticia</button>    </center>`


            let button = (objeto.pivot.visible) ? btn_hidden : btn_show;

            let noExiste= `no hay foto`
            let imagen=(objeto.path==null) ? noExiste : objeto.path.slice(7, objeto.path.length);
          
          
            let fecha_recortada=objeto.comienza.substr(0,10);
           console.log(fecha_recortada);
            let card = ` 
        
        

            <div class="noticia">  
      
            <center><img class="imagen" src="storage/${imagen}" alt="foto"  height="200">  </center>
      
        <div class="titulo">Título: ${objeto.titulo} </div> </br> 
      
      <!-- <p class="leermas"> <a href="#" id="mas" onclick="vermas('mas')">leer más</a> </p> -->
                    
       
          <!-- <p id="desplegar" class="texto" style="display:none">  --> <p class="texto" ><img src="/assets/icons-main/icons/file-text.svg" /> Texto: ${objeto.texto}</p>  </br>
      
           <!--<a href="#" id="menos" onclick="vermas('menos')">leer menos</a></p> -->
      
              <div class="autor"><img src="/assets/icons-main/icons/file-person.svg" /> Autor: ${objeto.autor} </div> </br>
                     <div class="comienza"> <img src="/assets/icons-main/icons/calendar-check.svg" />  Comienza: ${objeto.comienza.substr(0,10)} </div> 
                     
                     
                     ${button}
                     </div>
            
     


        `;
        path=null;
            return card;
        }

        function mostrarOcultas() {
           
          
            visible = !visible;

            if(visible){
                checkedCheckbox(false);
            }
            else{
                checkedCheckbox(true);
            }
            
            let opcion = (visible) ? 1 : 0;
            $('#listado').empty();

            axios.get(`./get-contenidos/${opcion}`)
                .then(res => {
                    console.log(res.data);
                    res.data.forEach(e => {
                        $('#listado').append(dibujarCard(e));
                    })
                }).catch(e => console.log(e))

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

        </div>
        </br>
        <div class="row">
            <div id="listado"></div>
        </div>
    </div>
    </div>
</body>
@endsection