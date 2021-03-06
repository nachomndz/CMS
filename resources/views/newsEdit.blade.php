@extends('layouts.app') @section('content')

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<link rel="stylesheet" href="/resources/demos/style.css">



<style>


div.hola{
    margin-bottom: 30px;
}

</style>

<script>

    
   var j = jQuery.noConflict();
    j(function() {
        j("#datepicker").datepicker();
        j("#format").on("change", function() {
            j("#datepicker").datepicker("option", "dateFormat", j(this).val());
        });
    });
    /*var j = jQuery.noConflict();
    j(function() {
    j("#datepicker").datepicker({
    format: 'dd-mm-yy'
});});
*/
    var h = jQuery.noConflict();
    h(function() {
        h("#datepicker1").datepicker();
        h("#format").on("change", function() {
            h("#datepicker1").datepicker("option", "dateFormat", h(this).val());
        });
    });
</script>

<script>
    let nacho = [],
        emails_ids;

    function borrar_ids() {
        nacho.pop();
        emails_ids = nacho.map(e => e).join(',')
        console.log(emails_ids);

        document.getElementById('user').value = emails_ids;
    }

    function testBut() {
        var userSelect = document.getElementById('SelectUser');
        var userseleccionado = userSelect.options[userSelect.selectedIndex].value;

        axios.get(`api/users/IdDadoEmail/${userseleccionado}`)
            .then(response => {

                [response.data].forEach(e => {
                    let y = nacho.filter(f => f == e.id);
                    if (!y.length)
                        nacho.push(e.id);
                });

                console.log(nacho);
                emails_ids = nacho.map(e => e).join(',')
                console.log(emails_ids);

                document.getElementById('user').value = emails_ids;

            })

        .catch(e => {
            // Podemos mostrar los errores en la consola
            console.log(e);
        })
    }




</script>

<body >

    <div class="container hola">
    
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crea la noticia') }}</div>

                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{ route('store') }}" method="POST">
                            @csrf

                            <div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Titulo:') }}</label>

                                    <div class="col-md-6">
                                        <input id="titulo" type="text" class="form-control @error('name') is-invalid @enderror" name="titulo" value="{{ old('name') }}" required autocomplete="titulo" autofocus> @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Subtítulo:') }}</label>

                                    <div class="col-md-6">
                                        <input id="subtitulo" type="text" name="subtitulo" required autocomplete="subtitulo"> @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> @enderror
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="texto" class="col-md-4 col-form-label text-md-right">Texto:</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" id="texto" name="texto" rows="3" required autocomplete="texto"></textarea>
                                    </div>

                                </div>




                                <div class="form-group row ">

                                <label for="texto" class="col-md-4 col-form-label text-md-right">Inserta una imágen:</label>

                                <div class="col-md-6">
     
                                <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                       
                                            </div>
                                    
                                    </div>


                                        </div>





                                <div class="form-group row">
                                    <label for="exampleFormControlSelect1" class="col-md-4 col-form-label text-md-right">Escoge la categoría de la noticia:</label>

                                    <div class="col-md-6">
                                        <select class="form-control " id="tipo" name="tipo">
                                            <option>Economía</option>
                                            <option>Empresa</option>
                                            <option>Reunión</option>
                                            <option>Planificación futura</option>
                                            <option>Ocio</option>
                                            <option>Off-Topic</option>
                                            <option>Información Urgente</option>
                                        </select>
                                    </div>

                                </div>

                                <?php

use App\Http\Controllers\Perfil\PerfilController;
use App\Http\Controllers\Tag\TagController;
$usuarios=App\User::all();



$Tags = TagController::staticIndex();
  //  echo "<select id='SelectUser1' name='SelectUs1' >";
   // foreach($usuarios as $email){

      //  echo "<option value='".$email['id']."'>".$email['email']."</option>";
    //}
   // echo "</select>";
    ?>

                               <!--     <input type="button" value="añadir" onclick="testBut()">

                                    <input type="button" value="borrar" onclick="borrar_ids()">

                                    <div class="form-group row">
                                        <label for="exampleFormControlSelect1" class="col-md-4 col-form-label text-md-right">Usuario/s o all::</label>

                                        <div class="col-md-6">
                                            <select class="form-control " id="SelectUser1" name="SelectUs">
                                                @foreach ($usuarios as $email)
                                                <option value="{{$email['id']}}">{{$email['email']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Id del usuario/all:') }}</label>
                                        <div class="col-md-6">
                                            <input id="user" type="text" name="user" autofocus>

                                        </div>

                                    </div> 
--->




                                    <?php

$data=PerfilController::staticIndex();

?>


                                    <div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Destinatarios:') }}</label>

    <div class="col-md-6">
        <select id="SelectUser" name="multiselect[]" multiple="multiple" required="">
            
        
        @foreach ($data as $perfil)
        <option value="{{$perfil->puesto}}">{{$perfil->puesto}}</option>
           
        @endforeach
        
        @foreach ($usuarios as $email)
            
            <option value="{{$email['id']}}">{{$email['email']}}</option>
            @endforeach


        </select>

    </div>
</div>


<script type="text/javascript">
$( "#SelectUser" ).change(function() {

console.log($('#SelectUser').val());

});

$(document).ready(function() {
            
                $('#SelectUser').multiselect({
                    includeSelectAllOption: true,
                    enableFiltering: true,
                    maxHeight: 250,
                    buttonWidth: '200px',
                    allSelectedText: 'Todas seleccionadas...',


                });
            });
        </script>




<script>
 function cambiarFormato() {
/*var inputFecha= document.getElementById("datepicker");
    
console.log(inputFecha.value)*/

/*
var x = $(datepicker).val();
alert(x.toISOString())*/


 //alert(x);


 //alert(x.toISOString());

 var x = $("#datepicker").val();

 fecha_en_ISO=new Date(x).toISOString();


 //console.log(fecha_en_ISO);
 
 //$("#datepicker").value=fecha_en_ISO;

 //console.log($("#datepicker").val());
/*
 $fecha_definitiva= moment($("#datepicker").val()).format();

 console.log($fecha_definitiva); */
 /*$("#datepicker").value=$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });



 $(function () {
        $('#datepicker').datepicker({
            dateFormat: 'dd-mm-yy'
        });
        $("#datepicker").datepicker().datepicker("setDate", new Date());
    });

*/
 /*
 $(function() {
$("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });

});*/
 //document.getElementById("#datapicker").value= new Date(x).toISOString();

 //console.log(selectedDate = moment(x,"MM-DD-YYYY"));


/*
var j = jQuery.noConflict();
    j(function() {
        j("#datepicker").datepicker();
        j("#format").on("change", function() {
            j("#datepicker").datepicker("option", "dateFormat", j(this).val());
        });
    });*/

/*
    $('#datepicker').on("dp.change",function(e){
        var selectedDate = $('#datepicker').find("input").val();
        selectedDate = moment(selectedDate,"MM-DD-YYYY");
        $(".temp").text(selectedDate.toISOString());
    });
*/


    //document.getElementById("#datapicker").value

 }
</script>


                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Autor:') }}</label>
                                        <div class="col-md-6">
                                            <input id="autor" type="text" name="autor" autofocus>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Comienza:') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" name="comienza" id="datepicker" onchange ="cambiarFormato()">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Caduca:') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" name="caduca" id="datepicker1">
                                        </div>
                                    </div>


                            
<!--

                                    <div class="form-group row">
                                        <label for="formato" class="col-md-4 col-form-label text-md-right">{{ __('Opciones de Formato(Escoge ISO):') }}</label>

                                        <div class="col-md-6">
                                            <select id="format" name='formato'>
                                                <option value="mm/dd/yy">Default - mm/dd/yy</option>
                                                <option value="yy-mm-dd">ISO 8601 - yy-mm-dd</option>
                                                <option value="d M, y">Short - d M, y</option>
                                                <option value="d MM, y">Medium - d MM, y</option>
                                                <option value="DD, d MM, yy">Full - DD, d MM, yy</option>
                                                <option value="&apos;day&apos; d &apos;of&apos; MM &apos;in the year&apos; yy">With text - 'day' d 'of' MM 'in the year' yy</option>
                                            </select>
                                            </p>
                                        </div>
                                    </div>-->
        
                                   <!--   <div class="form-group row">
                                            <label for="exampleFormControlSelect1" class="col-md-4 col-form-label text-md-right">Perfiles Destinatarios:</label>

                                            <div class="col-md-6">
                                                <select class="form-control " id="SelectUser" name="SelectUs">
                                                    @foreach ($data as $perfil)
                                                    <option value="{{$perfil->puesto}}">{{$perfil->puesto}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div> -->

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">

                                                <button type="submit" class="btn btn-primary" name="crear">
                                                    {{ __('Crear') }}

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

@endsection