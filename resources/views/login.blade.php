
@extends('maestra')

@section('titulo')
Login
@endsection

@section('contenido')
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
</div>
@endsection
