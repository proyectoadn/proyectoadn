
@extends('maestra')

@section('titulo')
Gestión de tareas
@endsection

@section('js')
    <script>


$(function(){
    $("#carg").change(function(){

        var id=$(this).val();
        var idjson=JSON.stringify(id);

        $.post("../resources/views/categorias.php", {rol: idjson},
                function (respuesta) {


                    var categorias=JSON.parse(respuesta);

                    $("#cat").html('<option id="categorias" value="-1">-Elige categoria-</option>');
                    for(var i=0;i<categorias.length;i++){
                        $("#cat").append('<option value='+categorias[i]['id']+'>'+categorias[i]['descripcion']+'</option>');
                    }

                }).fail(function (jqXHR) {
            alert("Error de tipo " + jqXHR.status);
        });
    });
});




    </script>
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
                //$(".item").css("overflow-y", "hidden");
                $(".flex-container").append(this);
            }
        });



        $(".tarea").droppable({
            drop: function (evento, ui) {

                $(".tarea").each(function (index, elem) {

                    $(".tarea").css("-webkit-transform", "rotate(0deg)");
                });
            }
        });



        $(".tarea").draggable({stack: "div", cursor: "move", revert: true});

        $(".tarea").draggable({
            drag: function (evento, ui) {

                $(this).css("-webkit-transform", "rotate(7deg)");
            }
        });


    });
</script>

<div class="row">
    <div class="contenedorPrincipal">
        <!--div que contiene los cargos y las categorias-->
        <div class="cargoCat">
            <div class='divBotonCargoCat'>
                <select id="carg" class='botonCargoCat form-control'>
                    <option value="-1">-Elige cargo-</option>

                </select>
            </div>
            <div class='divBotonCargoCat'>
                <select id="cat" name="cargos" size="" class='botonCargoCat form-control'>
                    <option id="categorias" value="-1">-Elige categoria-</option>

                </select>
            </div>
        </div>
        <div class='limpiar'></div>


    <div class="flex-container">

        <div class="item" id="item1">
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


        <div  class="item" id="item2">
            <div class="panel panel-primary tarea" >asdasdsad</div>
            <div class="panel panel-primary tarea" >asdasdsad</div>
            <div class="panel panel-primary tarea" >asdasdsad</div>
        </div>


        <div  class="item" id="item3">
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
