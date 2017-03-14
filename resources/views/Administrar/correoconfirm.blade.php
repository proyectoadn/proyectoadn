
@extends('../maestra')

@section('titulo')
Usuario
@endsection

@section('contenido')


<div class="container">
    <div class="panel panel-primary login">
        <div class="panel-body">
            <h2 class="form-signin-heading">Activar usuario</h2>
        </div>
        <div class="panel-footer">
            
            Buenas {!! $nombre !!}, <br><br>
            
            
            Para activar tu cuenta pulsa en el siguiente enlace,
            <br><br>
            
            <a href="localhost/Laravel/proyectoadn/public/activar?correo={!! $email !!}">Activar usuario</a>
            
        </div>
    </div>
</div>
@endsection