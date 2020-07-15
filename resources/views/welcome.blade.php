@extends('layouts.app')



<title>nachomndzTFG</title>


<style>
h1, h2, h3, h4 {
    font-family: 'PT Sans', sans-serif;
}
.contenedor {
    max-width: 1200px;
    width: 95%;
    margin: 0 auto;
}
  div.hola {
    margin-bottom: 100px;
  }

  .centrar-texto {
    text-align: center;
}

.no-margin {
    margin: 0;
}
  /**Grid */

/** Grid **/
@media (min-width: 768px) {
    .grid {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .centrar-columnas {
        justify-content: center;
    }
    .columnas-4 {
        flex: 0 0 calc(33.3% - 1rem);
    }
    .columnas-6 {
        flex: 0 0 calc(50% - 1rem);
    }
    .columnas-8 {
        flex: 0 0 calc(66.6% - 1rem);
    }
    .columnas-10 {
        flex: 0 0 calc(83.3% - 1rem);
    }
    .columnas-12 {
        flex: 0 0 100%;
    }
}

h2 {
    font-size: 4rem;
    line-height: 1.2;
}





</style>




@section('content')




<section class="container">
  <div class="row">
    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">-->
    <div class="container-fluid">
      <img class="img-fluid" width="100%" alt="SanLorenzo" src="parque-tecnologico.jpg">

    </div>


  </div>



</section>

</br>



<main class="contenedor">

  
  <h2 class="centrar-texto">¿Cómo te ayudamos?</h2>

</br>

  <div class="grid">

    <div class="columnas-6">

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="LARAVEL-ROJO.png" class="d-block w-100" alt="...">
     <!-- <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>-->
    </div>
    <div class="carousel-item">
      <img src="CMS.png" class="d-block w-100" alt="...">
     <!-- <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>-->
    </div>
    <div class="carousel-item">
      <img src="fases-produc.png" class="d-block w-100" alt="...">
    <!--  <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </div>-->
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    </div>
    <div class="columnas-6">
    
    <p>
      Hola ! Somos una compañia con un sede en el Parque Tecnológico que desarrolla Gestores de Contenido para que puedas sacarle más rendimiento a tu empresa
      teniendo una mayor y mejor comunicación con tus empleados. Con nuestro software podrás informar de lo que sea y cuando sea,
      mediante tarjetas de contenido que TÚ creas.
    </p>


      <p>Nuestro software tiene un control de usuarios, mediante roles, sólo el usuario Editor puede crear noticias. 
        ¿A qué esperas para probarlo? 
        Contáctanos en nuestra redes sociales que encontrarás al final de esta páginas y, ¡te personalizaremos el software
        para que se adapte exactamente a las necesidades de tu empresa!.
</p>
    </div>

  </div>
</main>


<!--
<section class="container hola" style=background:grey>
  <div class="row hola" style=text-align:center>
    <blockquote style=color:black>
      <p><em>La simplicidad es la máxima sofisticación</em> </p>
      <footer>Leonardo Da Vinci</footer>
    </blockquote>
  </div>
</section>-->


@endsection