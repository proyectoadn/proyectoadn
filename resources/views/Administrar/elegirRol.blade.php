
@extends('../maestra')

@section('titulo')
Elección de rol
@endsection

@section('contenido')
@include ('PhpAuxiliares/cabecera')
<div class="container">
    <div class="tituloElegirRol">
        <h2 style="color: #F3F3F3;">Elegir rol de acceso</h2>
    </div>
    <div class="row">
        <form action="administrador" method="POST">
            {!! csrf_field() !!}
            <div class="col-md-6 botonRol">

                <button type="submit" name="admin" id="admin" class="botonImagen" value="">
                    <img src="Imagenes/elegirRol/admin.png" class="imagenBoton"/></button>
                   <h4 style="color: #F3F3F3;">Administrador</h4>
            </div>
        </form>    
        <form action="usuario" method="POST">
            {!! csrf_field() !!}
            <div class="col-md-6 botonRol">
                <button type="submit" name="usuario" id="usuario" class="botonImagen" value="">
                    <img src="Imagenes/elegirRol/usuario.png" class="imagenBoton"/></button>
                <br>
                <h4 style="color: #F3F3F3;">Usuario</h4>
            </div>
        </form>
    </div>
</div>
@endsection
