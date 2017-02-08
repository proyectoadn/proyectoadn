
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
            
            Buenas {!! $email !!}, <br><br>
            
            
            Si quieres restablecer tu contraseña pulsa en el siguiente enlace,
            <br><br>
            
            <a href="localhost/Laravel/proyectoadn/public/restablecerpassword?correo={!! $email !!}">Restablecer contraseña</a>
            
        </div>
    </div>
</div>
@endsection
