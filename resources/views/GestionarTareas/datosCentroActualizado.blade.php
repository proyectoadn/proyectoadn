
@extends('../maestra')

@section('titulo')
Login
@endsection


@section('contenido')

<script src="jquery-2.1.4.js"></script>
<script src="jquery-ui.min.js"></script>


@include ('PhpAuxiliares/cabeceraadministrador')

<div class="alert alert-success divperfilactualziado" style="margin-top: 15px;" >Datos actualziados correctamente</div>


<div class="panel panel-primary divmiperfil">

    <div class="panel-body">
        <h2 class="form-signin-heading">Datos del centro</h2>
    </div>
    
    <div class="panel-footer">
        <!-- Formulario dentro del panel-->
        
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
                <input required type="text" name="codigopostal" value="{!! $codigopostal !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px; width: 100%;">
                <span class="input-group-addon" style="width: 20%;"><i>Teléfono</i></span>
                <input required type="text" name="telefono" value="{!! $telefono !!}" class="form-control">

            </div>

            <div class="input-group" style="margin-bottom: 5px; width: 100%;" >
                <span class="input-group-addon" style="width: 20%;"><i>Fax</i></span>
                <input required type="text" name="fax" value="{!! $fax !!}" class="form-control">
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
    </div>

</div>
@endsection
