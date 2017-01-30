
@extends('maestra')

@section('titulo')
Gestión de tareas
@endsection

@section('js')

@endsection

@section('contenido')

<script src="jquery-2.1.4.js"></script>
<script src="jquery-ui.min.js"></script>

<script>

    $(function () {

        $("#item1,#item2").droppable();

        $(".tarea").draggable({stack: "div", cursor: "move"});


        $(".tarea").draggable({
            drag: function (evento, ui) {

                $(this).css("-webkit-transform", "rotate(7deg)");
            }
        });



        $(".tarea").droppable({
            drop: function (evento, ui) {

                $(".tarea").each(function (index, elem) {

                    $(".tarea").css("-webkit-transform", "rotate(0deg)");
                });
            }
        });


    });
</script>

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
            <div class="panel panel-primary tarea" style="padding: 3px; margin:7px; min-height: 60px;">asdasdsad</div>
            <div class="panel panel-primary tarea" style="padding: 3px; margin:7px; min-height: 60px;">asdasdsad</div>
            <div class="panel panel-primary tarea" style="padding: 3px; margin:7px; min-height: 60px;">asdasdsad</div>
            <div class="panel panel-primary tarea" style="padding: 3px; margin:7px; min-height: 60px;">asdasdsad</div>
        </div>
        
        
        <div  class="item" id="item2">
            <div class="panel panel-primary tarea" style="padding: 3px; margin:7px; min-height: 60px;">asdasdsad</div>
            <div class="panel panel-primary tarea" style="padding: 3px; margin:7px; min-height: 60px;">asdasdsad</div>
            <div class="panel panel-primary tarea" style="padding: 3px; margin:7px; min-height: 60px;">asdasdsad</div>
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
