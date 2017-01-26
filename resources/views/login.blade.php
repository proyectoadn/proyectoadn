
@extends('maestra')

@section('titulo')
    Login
@endsection

@section('contenido')

    <div class="col-md-4 panel panel-primary">
        <div class="panel-body">
            <h2 class="form-signin-heading">Iniciar sesión</h2>
        </div>
        <div class="panel-footer">


            <form action="validar" method="POST">
                {!! csrf_field() !!}

                <input type="text" name="usuario"  class="form-control" placeholder="Usuario" required autofocus>
                <input type="password" name="password"  class="form-control" placeholder="Contraseña" required>

                <br>
                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Entrar">
                <br>
            </form>
        </div>
    </div>
@endsection
