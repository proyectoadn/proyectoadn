
@extends('../maestra')

@section('titulo')
Login
@endsection

@section('contenido')

<script src="jquery-2.1.4.js"></script>
<script src="jquery-ui.min.js"></script>


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

                <a href="enviarpassword">¿Has olvidado la contraseña?</a>
                <br>

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

    <script>

        $(function () {



            $("#datos").on("click", function () {

                $("#meterdatos").append('<p>Some text in the modal.</p>');
                $("#meterdatos").append('<p>Some text in the modal.</p>');
                $("#meterdatos").append('<button type="button" id="prueba" value="Prueba de boton" class="btn btn-info btn-lg">Boton</button>');

                $("#prueba").on("click", function () {

                    alert($(this).val());
                });
            });
        });
    </script>



    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
    <button type="button" id="datos" class="btn btn-info btn-lg">Añadir datos</button>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>

                <div id="meterdatos" class="modal-body">
                    <p>Some text in the modal.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
