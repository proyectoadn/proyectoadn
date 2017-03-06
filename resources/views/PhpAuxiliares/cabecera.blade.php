<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<script>

    $(function () {

        $("#cambiarrol").on("click", function () {


            document.location = "administrador";
        });
    });

</script>

<?php
$usu = new Usuario('', '', '', '', '');
$usu = \Session::get('u');



if (\Session::get('pagina') == 'gestiontareas') {

    $rol = 'Administrador';
} else {

    $rol = 'Usuario';
}
?>

<nav class="navbar navbar-default" role="navigation">
    <!-- El logotipo y el icono que despliega el menú se agrupan
         para mostrarlos mejor en los dispositivos móviles -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-ex1-collapse">
            <span class="sr-only">Desplegar navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="login">Inicio</a>
    </div>

    <!-- Agrupar los enlaces de navegación, los formularios y cualquier
         otro elemento que se pueda ocultar al minimizar la barra -->
    <div class="collapse navbar-collapse navbar-ex1-collapse" style="margin-right: 2%;">

        <ul class="nav navbar-nav navbar-right">



            <li class="dropdown">


                <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $usu->getNombre() ?> <i class="fa fa-caret-down"></i></a>

                <div class="row dropdown-menu" style="width: 350px; padding-top: 10px;">

                    <div class="" style="width: 100%; height: auto;">

                        <div style="max-height: 170px;min-height: 170px; padding-left: 10px;">



                            <div class="row">

                                <div class="col-md-4 col-xs-4" style="padding-left: 0px; padding-right: 0px;">
                                    <img src="Imagenes/Administrador/+.png" alt="Imagen de perfil" class="img-circle">
                                </div>


                                <div class="col-md-8 col-xs-6">
                                    <label><?php echo $usu->getNombre(); ?></label>
                                    <p><?php echo $usu->getEmail(); ?></p>
                                    <br>
                                    <form action="miperfil" method="POST" style="margin-bottom: 10px;">
                                        {!! csrf_field() !!}
                                        <input type="submit" name="perfil" style="width: 100%;" value="Mi perfil" class="btn btn-primary">
                                    </form>
                                    <form action="datosCentroVisualizar" method="POST">
                                        {!! csrf_field() !!}
                                        <input type="submit" name="datoscentro" style="width: 100%;" value="Datos centro" class="btn btn-primary" >
                                    </form>
                                </div>

                            </div>
                        </div>


                        <div class="divcerrarsesion">

                            @if (\Session::get('rol') == 'Administrador')
                            <input type="submit" name="cambiarrol" id="cambiarrol" onclick="cambiarrol()" value="Cambiar  rol a <?php echo $rol ?>" class="btn btn-default botoncambiarrol">
                            @endif

                            <form action="cerrarsesion" method="POST" class="form-inline">
                                {!! csrf_field() !!}

                                <input type="submit" name="cerrarsesion" value="Cerrar sesion" class="btn btn-default botoncerrarsesion">
                            </form>
                        </div>

                    </div>
                </div>
            </li>

        </ul>
    </div>
</nav>