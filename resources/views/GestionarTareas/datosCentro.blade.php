
@extends('../maestra')

@section('titulo')
Login
@endsection


@section('contenido')

@include ('PhpAuxiliares/cabeceraadministrador')
<div class="panel panel-primary divmiperfil">

    <!-- Cabecera del panel con el título-->
    <div class="panel-body">
        <h2 class="form-signin-heading">Datos centro</h2>
    </div>

    <div class="panel-footer">
        <!-- Formulario dentro del panel-->
        <form action="actualizarDatosCentro" method="POST">
            {!! csrf_field() !!}

            <div class="input-group" style="margin-bottom: 5px; width: 100%;">
                <span class="input-group-addon" style="width: 20%;"><i>Direccion</i></span>
                <input required type="text" name="direccion" value="{!! $direccion !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px; width: 100%;">
                <span class="input-group-addon" style="width: 20%;"><i>Ciudad</i></span>
                <input required type="text" name="ciudad" value="{!! $ciudad !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px; width: 100%;">
                <span class="input-group-addon" style="width: 20%;"><i>Provincia</i></span>
                <input required type="text" name="provincia" value="{!! $provincia !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px; width: 100%;">
                <span class="input-group-addon" style="width: 20%;"><i>Codigo postal</i></span>
                <input required type="text" maxlength="5" name="codigopostal" value="{!! $codigopostal !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px; width: 100%;">
                <span class="input-group-addon" style="width: 20%;"><i>Teléfono</i></span>
                <input required type="text" maxlength="9" name="telefono" value="{!! $telefono !!}" class="form-control">

            </div>

            <div class="input-group" style="margin-bottom: 5px; width: 100%;" >
                <span class="input-group-addon" style="width: 20%;"><i>Fax</i></span>
                <input required type="text" maxlength="9" name="fax" value="{!! $fax !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px; width: 100%;">
                <span class="input-group-addon" style="width: 20%;"><i>Email</i></span>
                <input required type="text" name="email1" value="{!! $email1 !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px; width: 100%;">
                <span class="input-group-addon" style="width: 20%;"><i>Email</i></span>
                <input type="text" name="email2" value="{!! $email2 !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px; width: 100%;">
                <span class="input-group-addon" style="width: 20%;"><i>Codigo del centro</i></span>
                <input required type="text" name="codigocentro" value="{!! $codigocentro !!}" class="form-control">
            </div>

            <br>

            <?php
            $usu = new Usuario('', '', '', '', '');
            $usu = \Session::get('u');


            if (\Session::get('rol') == 'Administrador') {
                ?>
                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Actualizar">
                <?php
            } else {
                //si no es admin no pongo el boton para poder actualizar
                ?>
                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Actualizar">
                <?php
            }
            ?>



            <br>
        </form>
    </div>
</div>
@endsection
