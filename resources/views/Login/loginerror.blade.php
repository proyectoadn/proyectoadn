
@extends('../maestra')

@section('titulo')
Login
@endsection

@section('contenido')

<script>
    window.onload = function () {
        var codificar = 0;
        $("#codificarDecodificar").on("click", function () {

            if (codificar == 0) {
                $("#inputPassword").attr({type: "text"});
                $("#codificarDecodificar").removeClass('glyphicon-eye-close');
                $("#codificarDecodificar").addClass('glyphicon-eye-open');
                codificar = 1;
            } else {
                if (codificar == 1) {
                    $("#inputPassword").attr({type: "password"});
                    $("#codificarDecodificar").removeClass('glyphicon-eye-open');
                    $("#codificarDecodificar").addClass('glyphicon-eye-close');
                    codificar = 0;
                }
            }
        });
    };
</script>

<div class="container">
    <div class="alert alert-danger loginerror" >Usuario o contraseña incorrectos</div>
    <div class="panel panel-primary loginerror">
        <div class="panel-body">
            <h2 class="form-signin-heading">Iniciar sesión</h2>
        </div>
        <div class="panel-footer">
            <form action="validar" method="POST">
                {!! csrf_field() !!}

                <!--Email-->
                <div class="input-group" style="margin-bottom: 5px;">
                    <span class="input-group-addon">@</span>
                    <input type="text" name="usuario" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus>
                </div>

                <!--Contraseña-->
                <div class="input-group"style="margin-bottom: 5px;">
                    <span class="input-group-addon" id="span1"><i class="glyphicon glyphicon-eye-close" id="codificarDecodificar"></i></span>
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
                </div>

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
</div>
@endsection
