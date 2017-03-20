
@extends('../maestra')

@section('titulo')
Login
@endsection

@section('contenido')



<div class="container">
    <div class="panel panel-primary login">
        <div class="panel-body">
            <h2 class="form-signin-heading">Cambio de contraseña</h2>
        </div>
        <div class="panel-footer">

            Se ha enviado un correo electronico a {!! $email !!}<br><br>
            
            <form action="login" method="POST">
                {!! csrf_field() !!}
                <input type="submit" name="volver" value="Volver al inicio" class="btn btn-primary">
            </form>

        </div>
    </div>
</div>
@endsection

