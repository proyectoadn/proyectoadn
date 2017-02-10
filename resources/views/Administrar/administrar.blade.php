
@extends('../maestra')

@section('titulo')
Elección de rol
@endsection

@section('contenido')

<div style="margin-top: 55px;">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
            <a class="navbar-brand" href="#">Logotipo</a>
        </div>

        <!-- Agrupar los enlaces de navegación, los formularios y cualquier
             otro elemento que se pueda ocultar al minimizar la barra -->
        <div class="collapse navbar-collapse navbar-ex1-collapse" style="margin-right: 2%;">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Enlace #1</a></li>
                <li><a href="#">Enlace #2</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Menú #2 <b class="caret"></b>
                    </a>

                    <div class="row dropdown-menu" style="width: 350px; background-color: #F3F3F3;">
                        <div class="container" style="width: 100%; height: 200px;">
                            <div style="height: 70%; background-color: blue;">

                            </div>
                            <div style="height: 30%; background-color: red;">
                                <div class="col-md-6">
                                    <input type="submit" name="registrar" id="registrar"
                                           value="Registrar" class="btn btn-primary">
                                </div>
                                <div class="col-md-6">
                                    <input type="submit" name="registrar" id="registrar"
                                           value="Registrar" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>

    <div class="contenedorPrincipal">
        <!--div que contiene los cargos y las categorias-->
        <div class="cargoCat">
            <div class='divBotonCargoCat'>
                <select id="carg" class='botonCargoCat form-control'>
                    <option value="-1">-Elige cargo-</option>
                    <option value="1">z</option>   
                </select>
            </div>
            <div class='divBotonCargoCat'>
                <select id="cat" name="cat" size="" class='botonCargoCat form-control'>
                    <option id="categorias" value="-1">-Elige categoria-</option>

                </select>
            </div>
        </div>
        <div class='limpiar'></div>


        <div class="row">
            <div class="col-md-6" >
                <div class="item" style="min-height: 400px;">
                    <b>Documentacion</b>
                    <div class="row">


                        <!-- BOTON + DOCUMENTO -->
                        <div class="col-md-6" style="padding: 0px; margin: auto; text-align: center;">
                            <div id="tareas" class="panel panel-primary tarea" style="height: 100px;">
                                </p>
                                <div style="height: 90px; width: 90px; margin: auto; padding: 0px;">
                                    <button class="" onclick="" value="" id="comentario" style="background: transparent; border: 0px; margin:0px;">
                                        <img alt="Añadir documento" title="Añadir documento" src="Imagenes/Administrador/+.png" style="width: 100%; height: 100%; display: block;" class=""/>
                                    </button>
                                </div>
                            </div>
                        </div>  

                        <div class="col-md-6" style="padding: 0px;">
                            <div id="tareas" class="panel panel-primary tarea" style="height: 100px; overflow-y: visible;">
                                <p class="textotarea"> 1234567890 1234567 890 1234567890 123456789asdas dasda  asd asd as dasd asd asda sd asd asdasdasdasdas d as das das da sd as da sdasd0 </p>
                                <p class="textotarea">
                                    <a href="">asljdh akjsdhaks dhkashdkjashdka shdkjahsdkjah dkjahsdkjashd</a>
                                </p>
                                <div style="height: 25px; width: 32px; float: right; margin: 0px; padding: 0px; position: relative;">
                                    <button class="" onclick="popup(this)" value="' + tarea[i]['id'] + '" id="comentario" style="width:100%; height:100%; background: transparent; border: 0px; margin:0px;">
                                        <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/>
                                    </button>
                                </div>
                            </div>
                        </div>  

                        <div class="col-md-6" style="padding: 0px;">
                            <div id="tareas" class="panel panel-primary tarea" style="height: 100px; overflow-y: visible;">
                                <p class="textotarea">  </p>
                                <p class="textotarea">
                                    <a href=""></a>
                                </p>
                                <div style="height: 25px; width: 32px; float: right; margin: 0px; padding: 0px; position: relative;">
                                    <button class="" onclick="popup(this)" value="' + tarea[i]['id'] + '" id="comentario" style="width:100%; height:100%; background: transparent; border: 0px; margin:0px;">
                                        <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/>
                                    </button>
                                </div>
                            </div>
                        </div> 



                    </div> 
                </div>
            </div>

            <div class="col-md-6" >
                <div class="item" style="min-height: 400px;">
                    <b>Tareas</b>
                    <div class="row">

                        <div class="col-md-4" style="padding: 0px; margin: auto; text-align: center;">
                            <div id="tareas" class="panel panel-primary tarea" style="height: 100px;">
                                </p>
                                <div style="height: 90px; width: 90px; margin: auto; padding: 0px;">
                                    <button class="" onclick="" value="" id="comentario" style="background: transparent; border: 0px; margin:0px;">
                                        <img alt="Añadir documento" title="Añadir documento" src="Imagenes/Administrador/+.png" style="width: 100%; height: 100%; display: block;" class=""/>
                                    </button>
                                </div>
                            </div>
                        </div>   

                        <div class="col-md-4" style="padding: 0px;">
                            <div id="tareas" class="panel panel-primary tarea" style="height: 100px; overflow-y: visible;">
                                 <p class="textotarea"> 1234567890 1234567 890 1234567890 123456789asdas dasda  asd asd as dasd asd asda sd asd asdasdasdasdas d as das das da sd as da sdasd0 </p>
                                <p class="textotarea">
                                    <a href="">asljdh akjsdhaks dhkashdkjashdka shdkjahsdkjah dkjahsdkjashd</a>
                                </p>
                                <div style="height: 25px; width: 32px; float: right; margin: 0px; padding: 0px; position: relative;">
                                    <button class="" onclick="popup(this)" value="' + tarea[i]['id'] + '" id="comentario" style="width:100%; height:100%; background: transparent; border: 0px; margin:0px;">
                                        <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4" style="padding: 0px;">
                            <div id="tareas" class="panel panel-primary tarea" style="height: 100px; overflow-y: visible;">
                                <p class="textotarea">  </p>
                                <p class="textotarea">
                                    <a href=""></a>
                                </p>
                                <div style="height: 25px; width: 32px; float: right; margin: 0px; padding: 0px; position: relative;">
                                    <button class="" onclick="popup(this)" value="' + tarea[i]['id'] + '" id="comentario" style="width:100%; height:100%; background: transparent; border: 0px; margin:0px;">
                                        <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4" style="padding: 0px;">
                            <div id="tareas" class="panel panel-primary tarea" style="height: 100px; overflow-y: visible;">
                                <p class="textotarea">  </p>
                                <p class="textotarea">
                                    <a href=""></a>
                                </p>
                                <div style="height: 25px; width: 32px; float: right; margin: 0px; padding: 0px; position: relative;">
                                    <button class="" onclick="popup(this)" value="' + tarea[i]['id'] + '" id="comentario" style="width:100%; height:100%; background: transparent; border: 0px; margin:0px;">
                                        <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/>
                                    </button>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>      
</div><!-- FIN ROW -->

@endsection
