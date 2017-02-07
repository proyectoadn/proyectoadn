
@extends('maestra')

@section('titulo')
Registro
@endsection
<script>

    //Nada más entrar, deja el foco en el primer campo del formulario, el nombre
    window.onload = function () {
        document.getElementById("email").focus();
    };
    var codificar = 0;
    $("#codificarDecodificar, #codificarDecodificar2").on("click", function () {


        if (codificar == 0) {
            $("#password").attr({type: "text"});
            $("#codificarDecodificar").removeClass('glyphicon-eye-close');
            $("#codificarDecodificar").addClass('glyphicon-eye-open');

            $("#repetirpassword").attr({type: "text"});
            $("#codificarDecodificar2").removeClass('glyphicon-eye-close');
            $("#codificarDecodificar2").addClass('glyphicon-eye-open');

            codificar = 1;
        } else {
            if (codificar == 1) {
                $("#password").attr({type: "password"});
                $("#codificarDecodificar").removeClass('glyphicon-eye-open');
                $("#codificarDecodificar").addClass('glyphicon-eye-close');

                $("#repetirpassword").attr({type: "password"});
                $("#codificarDecodificar2").removeClass('glyphicon-eye-open');
                $("#codificarDecodificar2").addClass('glyphicon-eye-close');
                codificar = 0;
            }
        }
    });


    };

</script>


@section('contenido')
<div class="container divregistro">

    <div class="col-md-8 col-md-push-4">

        <div class="panel-body">
            <h2 class="form-signin-heading">Formulario registro</h2>
        </div>

        <form action="registrar" method="POST">
            {!! csrf_field() !!}
            <!-- Columna inputs-->
            <div class="col-md-6">
                <div class="alert alert-danger" >Usuario o contraseña incorrectos</div>
                <!-- Input Nombre -->
                <div class="input-group" style="margin-bottom: 5px;">
                    <input type="text" name="nombre" title="nombre" 
                           id="nombre" placeholder="Nombre" onblur="validarNombre(this)" 
                           class="form-control" required value="{!! $nombre !!}"> 
                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                </div>

                <!-- Input Apellidos -->  
                <div class="input-group" style="margin-bottom: 5px;">
                    <input type="text" name="apellidos" title="apellidos" 
                           id="apellidos" placeholder="Apellidos" onblur="validarApellido(this)" 
                           class="form-control" required value="{!! $ape !!}">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                </div>

                <!-- Input Email -->    
                <div class="input-group" style="margin-bottom: 5px;">
                    <input type="email" name="email" title="email" 
                           id="email" placeholder="Email" onblur="validarEmail(this)" 
                           class="form-control" required>
                    <span class="input-group-addon">@</span>
                </div>

                <!-- Input Contraseña -->   
                <div class="input-group"style="margin-bottom: 5px;">
                    <input type="password" name="password" title="contraseña" 
                           id="password" placeholder="Contraseña" onblur="" 
                           class="form-control" required>
                    <span class="input-group-addon" id="span1"><i class="glyphicon glyphicon-eye-close" id="codificarDecodificar"></i></span>
                </div>

                <!-- Input repetir Contraseña -->  
                <div class="input-group"style="margin-bottom: 5px;">
                    <input type="password" name="repetirpassword" title="Repetir contraseña" 
                           id="repetirpassword" placeholder="Repita la contraseña" onblur="comprobarLongitudPass(this)" 
                           class="form-control" required> 
                    <span class="input-group-addon"><i class="glyphicon glyphicon-eye-close" id="codificarDecodificar2"></i></span>
                </div>

                <!--Boton registrar-->
                <input type="submit" name="registrar" id="registrar"  
                       value="Registrar" class="btn btn-primary">

                <!--Boton reiniciar formulario-->
                <input type="reset" name="reiniciar" id="reiniciar"
                       value="Reiniciar" class="btn btn-primary">
            </div>


            <div class="col-md-6" style="height: 34px; margin-bottom: 5px;">
                <span class=""  id=""></span>
            </div>
            <div class="col-md-6" style="height: 34px; margin-bottom: 5px;">
                <span class=""  id=""></span>
            </div>
            <!-- Validación Nombre -->
            <div class="col-md-6" style="height: 34px; margin-bottom: 5px;">
                <span class=""  id="textoNombre"></span>
            </div>

            <!-- Validación Apellido -->
            <div class="col-md-6" style="height: 34px; margin-bottom: 5px;">
                <span class="" id="textoApellido"></span>
            </div>

            <!--  -->
            <div class="col-md-6" style="height: 34px; margin-bottom: 5px;">
                <span class="" id="textoEmail"></span>
            </div>

            <!--  -->
            <div class="col-md-6" style="height: 34px; margin-bottom: 5px;">
                <span class="" id="textoPassword"></span>
            </div>

            <!-- Validación Contraseña -->
            <div class="col-md-6" style="height: 34px; margin-bottom: 5px;">
                <span class="" id="textoPasswordRepetida"></span>
            </div>
        </form>
    </div>

</div>
@endsection
