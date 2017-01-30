
@extends('maestra')

@section('titulo')
Login
@endsection

@section('contenido')

<script src="jquery-2.1.4.js"></script>
<script src="jquery-ui.min.js"></script>

<script>

    $(function () {

        $("#divisor1,#divisor2,#divisor3").droppable();

        $(".tarea").draggable({stack: "div", cursor: "move"});


        $(".tarea").draggable({
            drag: function (evento, ui) {

                $(this).css("-webkit-transform", "rotate(7deg)");
                //$(".tarea").css("z-index", "99");
                //$(".tarea").css("position", "absolute");
                //$(".divcontenedor").css("z-index", "5");
            }
        });

        /*
         $(".draggable2").draggable({
         deactivate: function (evento, ui) {
         
         $(".draggable2").css("-webkit-transform", "rotate(0deg)");
         }
         });
         */





        $("#divisor1,#divisor2,#divisor3").droppable({
            drop: function (evento, ui) {

                $(".tarea").each(function (index, elem) {

                    $(".tarea").css("-webkit-transform", "rotate(0deg)");
                });
            }
        });


    });
</script>

<div class="container">
    <div class="panel panel-primary login">
        <div class="panel-body">
            <h2 class="form-signin-heading">Iniciar sesión</h2>
        </div>
        <div class="panel-footer">
            <form action="validar" method="POST">
                {!! csrf_field() !!}

                <input type="text" name="usuario" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>

                <br>
                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Entrar">
                <br>
            </form>

            <form action="registro" method="POST">
                {!! csrf_field() !!}

                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Registro">
            </form>

        </div>
    </div>




    <div class="">

        <div class="divcontenedor" id="divisor1" style="background-color: brown;width: 200px; height: 300px; border: 1px solid black;">
            <div class="tarea" style="background-color: red;width: 100%; height: 25px; border: 1px solid black; margin-top: 10px;">
                Tarea que esta por hacer
            </div>
        </div>
        
        <div class="divcontenedor" id="divisor2">
        </div>
        
        <div class="divcontenedor" id="divisor3" style="background-color: brown;width: 200px; height: 300px; border: 1px solid black;">
        </div>
        
    </div>
</div>
@endsection
