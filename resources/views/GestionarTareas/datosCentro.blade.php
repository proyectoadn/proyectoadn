
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
        <h2 class="form-signin-heading">Datos centro</h2>
    </div>

    <div class="panel-footer">

        <form action="actualizarDatosCentro" method="POST">
            {!! csrf_field() !!}

            <div class="input-group" style="margin-bottom: 5px;">
                <span class="input-group-addon"><i>Direccion</i></span>
                <input type="text" name="direccion" value="{!! $direccion !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px;">
                <span class="input-group-addon"><i>Ciudad</i></span>
                <input type="text" name="ciudad" value="{!! $ciudad !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px;">
                <span class="input-group-addon"><i>Provincia</i></span>
                <input type="text" name="provincia" value="{!! $provincia !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px;">
                <span class="input-group-addon"><i>Codigo postal</i></span>
                <input type="text" name="codigopostal" value="{!! $codigopostal !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px;">
                <span class="input-group-addon"><i>Teléfono</i></span>
                <input type="text" name="telefono" value="{!! $telefono !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px;">
                <span class="input-group-addon"><i>Fax</i></span>
                <input type="text" name="fax" value="{!! $fax !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px;">
                <span class="input-group-addon"><i>Email</i></span>
                <input type="text" name="email1" value="{!! $email1 !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px;">
                <span class="input-group-addon"><i>Email</i></span>
                <input type="text" name="email2" value="{!! $email2 !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px;">
                <span class="input-group-addon"><i>Codigo del centro</i></span>
                <input type="text" name="codigocentro" value="{!! $codigocentro !!}" class="form-control">
            </div>

            <br>

            <input class="btn btn-lg btn-primary btn-block" type="submit" value="Actualizar">

            <br>
        </form>
    </div>
</div>
@endsection
