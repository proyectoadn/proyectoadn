
@extends('../maestra')

@section('titulo')
Login
@endsection


@section('contenido')

<script src="jquery-2.1.4.js"></script>
<script src="jquery-ui.min.js"></script>


@include ('PhpAuxiliares/cabeceraadministrador')

<div class="alert alert-success divperfilactualziado" >Datos actualziados correctamente</div>


<div class="panel panel-primary divmiperfil">

    <div class="panel-body">
        <h2 class="form-signin-heading">Datos del centro actualizados</h2>
    </div>

    <div class="panel-footer">

        <form action="actualizarperfil" method="POST">
            {!! csrf_field() !!}

            
            <br>

            <input class="btn btn-lg btn-primary btn-block" type="submit" value="Actualizar">

            <br>
        </form>
    </div>
</div>
@endsection
