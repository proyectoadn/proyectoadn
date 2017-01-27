
@extends('maestra')

@section('titulo')
Elección de rol
@endsection

@section('contenido')
<div class="container">
    <div class="tituloElegirRol">
        <h2>Elegir rol de acceso</h2>
    </div>
    <div class="row">
        <form action="" method="POST">
            {!! csrf_field() !!}
            <div class="col-md-6 botonRol">

                <button type="submit" name="admin" id="admin" class="botonImagen" value="">
                    <img src="Imagenes/elegirRol/admin.png" class="imagenBoton"/></button>
                <h4>Administrador</h4>
            </div>
        </form>    
        <form action="" method="POST">
            <div class="col-md-6 botonRol">
                <button type="submit" name="usuario" id="usuario" class="botonImagen" value="">
                    <img src="Imagenes/elegirRol/usuario.png" class="imagenBoton"/></button>
                <br>
                <h4>Usuario</h4>
            </div>
        </form>
    </div>
</div>
@endsection
