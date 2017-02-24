


<script src="assets/js/jquery.min.js"></script>
<script src="jquery-2.1.4.js"></script>
<script src="jquery-ui.min.js"></script>




<link rel="stylesheet" href="css/jquery.Jcrop.min.css" type="text/css"/>
<script src="js/jquery.Jcrop.min.js"></script>

<script>

    var ejex;
    var ejey;
    var ancho;
    var alto;

    $(function () {



        $("#archivo").val('');

        $("#cambiarrol").on("click", function () {


            document.location = "usuario";
        });




        function showCoords(c) {

            ejex = c.x;
            ejey = c.y;
            ancho = c.w;
            alto = c.h;


        }
        
        
        


        $("#archivo").change(function () {

            $("#fotoperfil").html('<img src="Imagenes/foto.jpg" class="imagenperfil" id="prueba">');
            
            var imagen = $('#prueba');
            
            var anchoreal = document.getElementById("prueba").naturalWidth;
            var altoreal = document.getElementById("prueba").naturalHeight;
            
            var anchoenpantalla = document.getElementById("prueba").width;
            var altoenpantalla = document.getElementById("prueba").height;
            
            
            
            var escala = anchoreal/anchoenpantalla;
            
            var xreal = escala*anchoenpantalla;
            var yreal = escala*altoenpantalla;
            
            
            
            

            $("#prueba").Jcrop({
                onSelect: showCoords,
                setSelect: [150, 150, 50, 50]
            });

        });


    });

    function recortarfoto(c)
    {




        var cordenadas = new Array();
        cordenadas.push(ejex);
        cordenadas.push(ejey);
        cordenadas.push(ancho);
        cordenadas.push(alto);
        var datos = JSON.stringify(cordenadas);


        $.post("../resources/views/PhpAuxiliares/recortarfoto.php", {cordenadas: datos},
                function (respuesta) {

                    alert(respuesta);



                }
        ).fail(function (jqXHR) {
            alert("Error de tipo " + jqXHR.status);
        });

    }
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
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-ex1-collapse">
            <span class="sr-only">Desplegar navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="login">Inicio</a>
        <a class="navbar-brand" href="administrar">Administrar documentacion</a>
        <a class="navbar-brand" href="asignarTareas">Asignar tareas</a>
        <a class="navbar-brand" href="activarUsuarios">Activar usuarios</a>
        <a class="navbar-brand" href="administrarUsuarios">Administrar usuarios</a>
    </div>

    <!-- Agrupar los enlaces de navegación, los formularios y cualquier
         otro elemento que se pueda ocultar al minimizar la barra -->
    <div class="collapse navbar-collapse navbar-ex1-collapse" style="margin-right: 2%;">

        <ul class="nav navbar-nav navbar-right">

            <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown"> Cambiar Rol <i class="fa fa-caret-down"></i></a>

            <div class="dropdown-menu" style="width: 350px; background-color: #F3F3F3;">

                <div class="" style="width: 50%;padding-left: 20px;">

                    <a href="administrador"> Administrador </a><br>
                    <a href="usuario"> Usuario </a>

                </div>
            </div>


            <li class="dropdown">

                <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $usu->getNombre() ?> <i class="fa fa-caret-down"></i></a>

                <div class="row dropdown-menu divdesplegableusuario">

                    <div class="divgeneralusuario">

                        <div class="divcontenidousuario">



                            <div class="row">

                                <div class="col-md-4 col-xs-4 imagenusuario" id="imagen">
                                    <img src="Imagenes/Administrador/+.png" id="cambiarimagen" alt="Imagen de perfil" data-toggle="modal" data-target="#modalimagen" class="img-circle">
                                </div>


                                <div class="col-md-8 col-xs-6">
                                    <label><?php echo $usu->getNombre(); ?></label>
                                    <p><?php echo $usu->getEmail(); ?></p>
                                    <br>
                                    <form action="miperfil" method="POST">
                                        {!! csrf_field() !!}

                                        <input type="submit" name="perfil" style="width: 100%;" value="Mi perfil" class="btn btn-primary">
                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="divcerrarsesion">

                            <input type="submit" name="cambiarrol" id="cambiarrol" onclick="cambiarrol()" value="Cambiar  rol a <?php echo $rol ?>" class="btn btn-default botoncambiarrol">

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

                <div id="fotoperfil">
                    <!--<img src="Imagenes/foto.jpg" class="imagenperfil" id="prueba">-->
                </div>

                <input type="file" name="archivo" id="archivo" value="prueba">

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="recortarfoto()">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>

