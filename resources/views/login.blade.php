
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
            <form action="comprueba" method="POST">
                {!! csrf_field() !!}

                <input type="text" name="user" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus>
                <input type="password" name="passw" id="inputPassword" class="form-control" placeholder="Contraseña" required>

                <br>
                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Entrar">
                <br>
            </form>


            @if(isset($result))
                @if($result == 1)
                    <script>
                        alert("Credenciales incorrectas");
                    </script>
                @endif
            @endif
        </div>
    </div>
@endsection
