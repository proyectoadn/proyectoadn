<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
$usu = new Usuario('', '', '', '', '');
$usu = \Session::get('u');
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
        <a class="navbar-brand" href="login">Administrar documentacion</a>
        <a class="navbar-brand" href="login">Asignar tareas</a>
        <a class="navbar-brand" href="login">Activar usuarios</a>
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

                <div class="row dropdown-menu" style="width: 350px; background-color: #F3F3F3;">

                    <div class="container" style="width: 100%; height: 200px;">

                        <a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a>

                    </div>
                </div>
            </li>

        </ul>
    </div>
</nav>