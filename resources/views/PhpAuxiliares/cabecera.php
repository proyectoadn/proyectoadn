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

if (\Session::get('rol') == 'Administrador') {

    $rol = 'Usuario';
} 
else {

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
    </div>

    <!-- Agrupar los enlaces de navegación, los formularios y cualquier
         otro elemento que se pueda ocultar al minimizar la barra -->
    <div class="collapse navbar-collapse navbar-ex1-collapse" style="margin-right: 2%;">

        <ul class="nav navbar-nav navbar-right">


            <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown"> Cambiar Rol <i class="fa fa-caret-down"></i></a>

            <div class="row dropdown-menu" style="width: 350px; background-color: #F3F3F3;">

                <div class="" style="width: 50%;padding-left: 20px;">

                    <a href="administrador"> Administrador </a><br>
                    <a href="usuario"> Usuario </a>

                </div>
            </div>



            <li class="dropdown">


                <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $usu->getNombre() ?> <i class="fa fa-caret-down"></i></a>

                <div class="row dropdown-menu" style="width: 350px; padding-top: 10px;">

                    <div class="" style="width: 100%; height: auto;">

                        <div style="max-height: 150px;min-height: 150px; padding-left: 10px;">



                            <div class="row">

                                <div class="col-md-4 col-xs-4" style="padding-left: 0px; padding-right: 0px;">
                                    <img src="Imagenes/Administrador/+.png" alt="Imagen de perfil" class="img-circle">
                                </div>


                                <div class="col-md-8 col-xs-6">
                                    <label><?php echo $usu->getNombre(); ?></label>
                                    <p><?php echo $usu->getEmail(); ?></p>
                                    <br>
                                    <input type="submit" name="perfil" style="width: 100%;" value="Mi perfil" class="btn btn-primary">
                                </div>

                            </div>
                        </div>

                        <div style=" background-color: #E0E0E0; padding: 5px; padding-right: 15px;">

                            <input type="submit" style="text-align: left;" name="cambiarrol" id="cambiarrol" onclick="cambiarrol()" value="Cambiar  rol a <?php echo $rol ?>" class="btn btn-default">
                            <input type="submit" style="position: absolute; right: 5px;" name="cerrarsesion" value="Cerrar sesion" class="btn btn-default">
                        </div>

                    </div>
                </div>
            </li>

        </ul>
    </div>
</nav>