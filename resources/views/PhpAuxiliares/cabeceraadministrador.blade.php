<script src="assets/js/jquery.min.js"></script>
<script src="jquery-2.1.4.js"></script>
<script src="jquery-ui.min.js"></script>


<link rel="stylesheet" href="css/jquery.Jcrop.min.css" type="text/css"/>
<!--FAVICON-->
<link rel="icon" 
      type="image/png" 
      href="Imagenes/Logos/favicon.png">


<script src="js/jquery.Jcrop.min.js"></script>

<script>

    $(function () {


        $("#archivo").val('');

        $("#cambiarrol").on("click", function () {


            document.location = "usuario";
        });
<?php
if (Route::current()->getName() == "administrar") {
    ?>
            $("#admin").addClass("active");
    <?php
} else {
    if (Route::current()->getName() == "asignarTareas") {
        ?>
                $("#tarea").addClass("active");
        <?php
    } else {
        if (Route::current()->getName() == "activarUsuarios") {
            ?>
                    $("#activar").addClass("active");
            <?php
        } else {
            if (Route::current()->getName() == "administrarUsuarios") {
                ?>
                        $("#adminUsu").addClass("active");
                <?php
            } else {
                if (Route::current()->getName() == "gestion") {
                    ?>
                            $("#gestiondatos").addClass("active");
                    <?php
                } else {
                    if (Route::current()->getName() == "verLog") {
                        ?>
                                $("#historico").addClass("active");
                        <?php
                    }
                }
            }
        }
    }
}
?>

    });

</script>

<?php
$usu = new Usuario('', '', '', '', '');
$usu = \Session::get('u');


if (\Session::get('rol') == 'Administrador') {

    $rol = 'Usuario';
} else {

    $rol = 'Administrador';
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

            <li><a class="letrasgrandes" href="paginainicio">Inicio</a></li>
            <li id="admin" class=""><a class="letrasgrandes" href="administrar">Administrar documentacion</a></li>
            <li id="tarea" class=""><a class="letrasgrandes" href="asignarTareas">Asignar tareas</a></li>
            <li id="activar" class=""><a class="letrasgrandes" href="activarUsuarios">Activar usuarios</a></li>
            <li id="adminUsu" class=""><a class="letrasgrandes" href="administrarUsuarios">Gestion usuarios</a></li>
            <li id="gestiondatos" class=""><a class="letrasgrandes" href="gestion">Gestion de datos</a></li>
            <li id="historico" class=""><a class="letrasgrandes" href="verLog">Histórico</a></li>

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

                                <div class="col-md-5 col-xs-4 imagenusuario" id="imagen">
                                    <img src="Imagenes/Fotosusuarios/<?php echo $usu->getId_usuario() ?>/fotorecortada.jpg" id="cambiarimagen" alt="Pincha aqui para cambiar tu foto perfil"
                                         data-toggle="modal" data-target="#modalimagen" class="img-circle">

                                </div>


                                <div class="col-md-7 col-xs-8">
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

                            <input type="submit" name="cambiarrol" id="cambiarrol" onclick="cambiarrol()"
                                   value="Cambiar  rol a <?php echo $rol ?>" class="btn btn-default botoncambiarrol">

                            <form action="cerrarsesion" method="POST" class="form-inline">
                                {!! csrf_field() !!}

                                <input type="submit" name="cerrarsesion" value="Cerrar sesion"
                                       class="btn btn-default botoncerrarsesion">
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


                <form action="subirimagen" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <input title="seleccionar archivo" type="file" name="archivo" id="archivo" value="prueba">

                    <input title="subir la imagen" type="submit" name="subir" value="Subir" class="btn btn-primary botonsubir">
                </form>

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
