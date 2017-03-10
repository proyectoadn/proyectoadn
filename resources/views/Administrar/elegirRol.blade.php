
@extends('../maestra')

@section('titulo')
Elección de rol
@endsection

@section('contenido')
@include ('PhpAuxiliares/cabeceraelegirrol')
<div class="container margeninferior">
    <div class="tituloElegirRol">
        <h2 class="colorGris">Elegir rol de acceso</h2>
    </div>
    <div class="row">
        <form action="administrador" method="POST">
            {!! csrf_field() !!}
            <div class="col-md-6 botonRol">
                <button type="submit" name="admin" id="admin" class="botonImagen">
                    <img alt="Entrar como administrador" src="Imagenes/elegirRol/admin.png" class="imagenBoton"/></button>
                   <h4 class="colorGris">Administrador</h4>
            </div>
        </form>    
        <form action="usuario" method="POST">
            {!! csrf_field() !!}
            <div class="col-md-6 botonRol">
                <button type="submit" name="usuario" id="usuario" class="botonImagen">
                    <img alt="Entrar como usuario" src="Imagenes/elegirRol/usuario.png" class="imagenBoton"/></button>
                <br>
                <h4 class="colorGris">Usuario</h4>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer')

    @include ('PhpAuxiliares/footer')

@endsection
