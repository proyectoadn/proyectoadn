
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
            <h2 class="form-signin-heading">Mi Perfil</h2>
        </div>
        <div class="panel-footer">
            <form action="" method="POST">
                {!! csrf_field() !!}

                <div class="input-group" style="margin-bottom: 5px;">
                    <span class="input-group-addon">@</span>
                    <input type="text" name="nombre" class="form-control">
                </div>

                <div class="input-group"style="margin-bottom: 5px;">
                    <span class="input-group-addon" id="span1"><i class="glyphicon glyphicon-lock" id="codificarDecodificar"></i></span>
                    <input type="text" name="apellidos" class="form-control">
                </div>
                
                <div class="input-group" style="margin-bottom: 5px;">
                    <span class="input-group-addon">@</span>
                    <input type="text" name="email" class="form-control">
                </div>
                
                <div class="input-group" style="margin-bottom: 5px;">
                    <span class="input-group-addon">@</span>
                    <input type="text" name="password" class="form-control">
                </div>
                
                <div class="input-group" style="margin-bottom: 5px;">
                    <span class="input-group-addon">@</span>
                    <input type="text" name="repetirpassword" class="form-control">
                </div>

                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Actualizar">

                <br>
            </form>

            <form action="" method="POST">
                {!! csrf_field() !!}

                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Volver">
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

</div>
@endsection
