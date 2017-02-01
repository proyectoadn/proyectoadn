
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
        

        $("#item1,#item2,#item3").sortable({
            
            connectWith: ".conectardivisores",
            cursor: "move",
            start: function( event, ui ){
                
                
                $(ui.item).css("-webkit-transform", "rotate(7deg)");
            },
            stop: function( event, ui ){
                
                
                $(ui.item).css("-webkit-transform", "rotate(0deg)");
            }
        })

        //$(".tarea").draggable({stack: "div", cursor: "move"});
        

        /*
        $(".tarea").droppable({
            drop: function (evento, ui) {

                $(".tarea").each(function (index, elem) {

                    $(".tarea").css("-webkit-transform", "rotate(0deg)");
                });
            }
        });
        */



    });
</script>

<div class="contenedorPrincipal">
    <!--div que contiene los cargos y las categorias-->
    <div class="cargoCat">
        
        <div class='divBotonCargoCat'>
            
            <select class="form-control">
                <option>Prueba</option>
                <option>Prueba</option>
                <option>Prueba</option>
            </select>
        </div>
        
        <div class='divBotonCargoCat'>
            
            <select class="form-control">
                <option>Prueba</option>
                <option>Prueba</option>
                <option>Prueba</option>
            </select>
        </div>
        
    </div>
    
    <div class='limpiar'></div>


    <div class="flex-container">

        <div class="item conectardivisores" id="item1">
            <div class="panel panel-primary tarea" >asdasdsad</div>
            <div class="panel panel-primary tarea" >asdasdsad</div>
            <div class="panel panel-primary tarea" >asdasdsad</div>
            <div class="panel panel-primary tarea" >asdasdsad</div>
            <div class="panel panel-primary tarea" >asdasdsad</div>
            <div class="panel panel-primary tarea" >asdasdsad</div>
            <div class="panel panel-primary tarea" >asdasdsad</div>
            <div class="panel panel-primary tarea" >asdasdsad</div>
            <div class="panel panel-primary tarea" >asdasdsad</div>


        </div>


        <div  class="item conectardivisores" id="item2">
            <div class="panel panel-primary tarea" >asdasdsad</div>
            <div class="panel panel-primary tarea" >asdasdsad</div>
            <div class="panel panel-primary tarea" >asdasdsad</div>
        </div>


        <div  class="item conectardivisores" id="item3">
            3
        </div>


        <div  class="item" id="item4">
            4
        </div>


        <div  class="item" id="item5">
            <div class="panel panel-primary tarea" >
                <form action="#" method="POST">
                    {!! csrf_field() !!}
                    <div class="checkbox">
                        <label><input type="checkbox" value="">DOCUMENTO TAL</label>
                    </div>
                </form>
            </div>

            <div class="panel panel-primary tarea" >
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
