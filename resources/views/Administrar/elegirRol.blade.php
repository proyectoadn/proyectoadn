
@extends('../maestra')

@section('titulo')
Elección de rol
@endsection

@section('contenido')
@include ('PhpAuxiliares/cabeceraelegirrol')
<div class="container">
    <div class="tituloElegirRol">
        <h2 class="colorGris">Elegir rol de acceso</h2>
    </div>
    <div class="row">
        <form action="administrador" method="POST">
            {!! csrf_field() !!}
            <div class="col-md-6 botonRol">

                <button type="submit" name="admin" id="admin" class="botonImagen" value="">
                    <img src="Imagenes/elegirRol/admin.png" class="imagenBoton"/></button>
                   <h4 class="colorGris">Administrador</h4>
            </div>
        </form>    
        <form action="usuario" method="POST">
            {!! csrf_field() !!}
            <div class="col-md-6 botonRol">
                <button type="submit" name="usuario" id="usuario" class="botonImagen" value="">
                    <img src="Imagenes/elegirRol/usuario.png" class="imagenBoton"/></button>
                <br>
                 <h4 class="colorGris">Usuario</h4>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer')

<div class="divfooter">

    Desarrollado por:

    Daniel Ramirez Ros -
    Alberto de la Plaza Ramos -
    Nazario Castillero Redondo<br>

    Copyright 2017 - Proyectoadn
</div>

@endsection
