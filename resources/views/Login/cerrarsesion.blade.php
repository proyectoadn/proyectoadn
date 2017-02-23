
@extends('../maestra')

@section('titulo')
Login
@endsection

@section('contenido')

<div class="container">
    <div class="alert alert-success loginerror" >Session cerrada correctamente</div>
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
                    <span class="input-group-addon" id="span1"><i class="glyphicon glyphicon-lock" id="codificarDecodificar"></i></span>
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