
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
            <div class="panel panel-primary" style="padding: 3px; margin:7px; min-height: 60px; background-color: #f3f3f3;">asdasdsad</div>
            <div class="panel panel-primary" style="padding: 3px; margin:7px; min-height: 60px;">asdasdsad</div>
            <div class="panel panel-primary" style="padding: 3px; margin:7px; min-height: 60px;">asdasdsad</div>
            <div class="panel panel-primary">asdasdasd</div>
            <div class="dentro"></div>
            <div class="dentro"></div>
            <div class="dentro"></div>
            <div class="dentro"></div>
            <div class="dentro"></div>
            <div class="dentro"></div>
            <div class="dentro"></div>
            <div class="dentro"></div>
            <div class="dentro"></div>


        </div>
        <div  class="item" id="item2">
            <div class="dentro panel-body"></div>
            <div class="dentro"></div>
            <div class="dentro"></div>
        </div>
        <div  class="item" id="item3">
            3
        </div>
        <div  class="item" id="item4">
            4
        </div>
        <div  class="item" id="item5">
            5
        </div>    
    </div>
</div>


@endsection
