
@extends('../maestra')

@section('titulo')
Login
@endsection


@section('contenido')

<script src="jquery-2.1.4.js"></script>
<script src="jquery-ui.min.js"></script>


@include ('PhpAuxiliares/cabeceraadministrador')


<div class="panel panel-primary divmiperfil">

    <div class="panel-body">
        <h2 class="form-signin-heading">Datos personales</h2>
    </div>

    <div class="panel-footer">


        <form action="passwordperfil" method="POST">
            {!! csrf_field() !!}
            

            <div style="margin-bottom: 5px;">
                <input class="btn btn-lg btn-default btn-block botoncambiarcontraseña" type="submit" value="Cambiar contraseña actual">
            </div>
        </form>


        <form action="actualizarperfil" method="POST">
            {!! csrf_field() !!}

            <div class="input-group" style="margin-bottom: 5px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                <input type="text" name="nombre" value="{!! $usuario->getNombre() !!}" class="form-control">
            </div>

            <div class="input-group"style="margin-bottom: 5px;">
                <span class="input-group-addon" id="span1"><i class="glyphicon glyphicon-font"></i></span>
                <input type="text" name="apellidos" value="{!! $usuario->getApellidos() !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px;">
                <span class="input-group-addon">@</span>
                <input type="text" name="email" value="{!! $usuario->getEmail() !!}" class="form-control">
            </div>
            <br>

            <input class="btn btn-lg btn-primary btn-block" type="submit" value="Actualizar">

            <br>
        </form>
    </div>
</div>
@endsection


@section('footer')

    @include ('PhpAuxiliares/footer')

@endsection
