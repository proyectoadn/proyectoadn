
@extends('../maestra')

@section('titulo')
Centro
@endsection


@section('contenido')

@include ('PhpAuxiliares/cabecera')
<div class="panel panel-primary divmiperfil">

    <!-- Cabecera del panel con el título-->
    <div class="panel-body">
        <h2 class="form-signin-heading">Datos centro</h2>
    </div>

    <div class="panel-footer">
        <!-- Formulario dentro del panel-->
        <form action="datosCentroVisualizar" method="POST">
            {!! csrf_field() !!}

            <div class="input-group" style="margin-bottom: 5px; width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><i>Direccion</i></span>
                <input title="Direccion del centro" required readonly type="text" name="direccion" value="{!! $direccion !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px; width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><i>Ciudad</i></span>
                <input title="Ciudad del centro" required readonly type="text" name="ciudad" value="{!! $ciudad !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px; width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><i>Provincia</i></span>
                <input title="Privincia del centro" required readonly type="text" name="provincia" value="{!! $provincia !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px; width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><i>Codigo postal</i></span>
                <input title="Codigo postal" required readonly type="text" maxlength="5" name="codigopostal" value="{!! $codigopostal !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px; width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><i>Teléfono</i></span>
                <input title="Telefono del centro" required readonly type="text" maxlength="9" name="telefono" value="{!! $telefono !!}" class="form-control">

            </div>

            <div class="input-group" style="margin-bottom: 5px; width: 100%;" >
                <span class="input-group-addon" style="width: 30%;"><i>Fax</i></span>
                <input title="Fax del centro" required readonly type="text" maxlength="9" name="fax" value="{!! $fax !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px; width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><i>Email</i></span>
                <input title="Email del centro" required readonly type="text" name="email1" value="{!! $email1 !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px; width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><i>Email</i></span>
                <input title="Email secundario del centro" readonly type="text" name="email2" value="{!! $email2 !!}" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px; width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><i>Codigo del centro</i></span>
                <input title="Codigo del centro" required readonly type="text" name="codigocentro" value="{!! $codigocentro !!}" class="form-control">
            </div>

            <br>
            
            <br>
        </form>
    </div>
</div>
@endsection
