
@extends('maestra')

@section('titulo')
Gestión de tareas
@endsection

@section('js')
<script>
    $(document).ready(function () {
        var usuario = JSON.parse("{{ json_encode($user) }}");
        alert(usuario);

        //   $("#aceptar").on("click",function(){

        /*
         var nom = JSON.stringify($("#usuario").val());
         
         $.post("servidor.php",{n:nom},
         function(respuesta){
         
         
         
         if(respuesta === 'Existe'){
         
         window.location = "Bienvenido.php";
         }
         else{
         
         window.location = "index.php";
         }
         
         }).error( function(){
         alert("Error");
         });
         });
         */
    });
</script>
@endsection

@section('contenido')

<div class="contenedorPrincipal">
    <!--div que contiene los cargos y las categorias-->
    <div class="cargoCat">
        <div class='divBotonCargoCat'>
            <select name="cargos" size="" class='botonCargoCat form-control'>
                <option value="1">Cargo1</option>
                <option value="2">Cargo2</option>
                <option value="3">Cargo3</option>
            </select>
        </div>
        <div class='divBotonCargoCat'>
            <select name="categoria" size="" class='botonCargoCat form-control'>
                <option value="1">Cargo1</option>
                <option value="2">Cargo2</option>
                <option value="3">Cargo3</option>
            </select>
        </div>
    </div>
    <div class='limpiar'></div>


    <div class="flex-container">
        <div class="item" id="item1">
            <div class="panel panel-primary dentro" >asdasdsad</div>
            <div class="panel panel-primary dentro" >asdasdsad</div>
            <div class="panel panel-primary dentro" >asdasdsad</div>
            <div class="panel panel-primary dentro" >asdasdsad</div>
            <div class="panel panel-primary dentro" >asdasdsad</div>
            <div class="panel panel-primary dentro" >asdasdsad</div>
            <div class="panel panel-primary dentro" >asdasdsad</div>
            <div class="panel panel-primary dentro" >asdasdsad</div>
            <div class="panel panel-primary dentro" >asdasdsad</div>


        </div>
        <div  class="item" id="item2">
            <div class="panel panel-primary dentro" >asdasdsad</div>
            <div class="panel panel-primary dentro" >asdasdsad</div>
            <div class="panel panel-primary dentro" >asdasdsad</div>
        </div>
        <div  class="item" id="item3">
            3
        </div>
        <div  class="item" id="item4">
            4
        </div>
        <div  class="item" id="item5">
            <div class="panel panel-primary dentro" >
                <form action="#" method="POST">
                    {!! csrf_field() !!}
                    <div class="checkbox">
                        <label><input type="checkbox" value="">DOCUMENTO TAL</label>
                    </div>
                </form>
            </div>
            
                        <div class="panel panel-primary dentro" >
                <form action="#" method="POST">
                    {!! csrf_field() !!}
                    <div>
                        <label><input type="checkbox" value="" class="form-control" size="10">DOCUMENTO PASCUAL</label>
                    </div>
                </form>
            </div>
        </div>    
    </div>
</div>


@endsection
