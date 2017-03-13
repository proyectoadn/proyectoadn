<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!--FAVICON-->
<link rel="icon" 
      type="image/png" 
      href="Imagenes/Logos/favicon.png">

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
    <div class="navbar-header row">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-ex1-collapse">
            <span class="sr-only">Desplegar navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

    </div>

    <!-- Agrupar los enlaces de navegación, los formularios y cualquier
         otro elemento que se pueda ocultar al minimizar la barra -->
    <div class="collapse navbar-collapse navbar-ex1-collapse" style="margin-right: 2%;">

        <ul class="nav navbar-nav">

            <li><a class="letrasgrandes" href="login">Inicio</a></li>
            <a class="" href="usuario"><img src="Imagenes/Logos/logoCabeceraUser.png" style="margin-top: 3px; margin-left: 500px;" alt="Logo GETY"></a>

        </ul>


        <ul class="nav navbar-nav navbar-right">


            <li class="dropdown">

                <a href="#" class="dropdown-toggle navbar-brand todalinea" data-toggle="dropdown"><span
                        class="glyphicon glyphicon-user"></span> <?php echo $usu->getNombre() ?> <i
                        class="fa fa-caret-down"></i></a>

                <div class="row dropdown-menu divdesplegableusuario">

                    <div class="divgeneralusuario">

                        <div class="divcontenidousuario fondoblanco">


                            <div class="row">

                                <div class="col-md-4 col-xs-4 imagenusuario" id="imagen">
                                    <img src="Imagenes/Administrador/+.png" id="cambiarimagen" alt="Imagen de perfil"
                                         data-toggle="modal" data-target="#modalimagen" class="img-circle">
                                </div>


                                <div class="col-md-8 col-xs-8">
                                    <label><?php echo $usu->getNombre(); ?></label>

                                    <p><?php echo $usu->getEmail(); ?></p>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12 col-xs-6">
                                            <form action="miperfil" method="POST" style="margin-bottom: 10px;">
                                                {!! csrf_field() !!}

                                                <input type="submit" name="perfil" style="width: 100%;"
                                                       value="Mi perfil" class="btn btn-primary">
                                            </form>
                                        </div>
                                        <div class="col-md-12 col-xs-6">
                                            <form action="datoscentro" method="POST">
                                                {!! csrf_field() !!}
                                                <input name="datoscentro" style="width: 100%;" value="Datos centro"
                                                       class="btn btn-primary" type="submit">
                                            </form>
                                        </div>
                                    </div>
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

<div id="modalimagen" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cambiar foto de perfil</h4>
            </div>


            <div class="modal-body" style="width: 100%;">

                <div id="mensaje">
                </div>

                <div id="fotoperfil">
                    <!--<img src="Imagenes/foto.jpg" class="imagenperfil" id="prueba">-->
                </div>


                <form action="subirimagen" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <input title="seleccionar archivo" type="file" name="archivo" id="archivo" value="prueba">

                    <input title="subir la imagen" type="submit" name="subir" value="Subir" class="btn btn-primary">
                </form>

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="recortarfoto()">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>

