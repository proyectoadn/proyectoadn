
@extends('../maestra')

@section('titulo')
Registro
@endsection
<script>

    //Nada más entrar, deja el foco en el email
    window.onload = function () {
        document.getElementById("email").focus();
    


    //ESTA ES LA FUNCIÓN PARA VER O NO VER LA CONTRASEÑA y que además te cambie el logo
    //Pulses en el incono de contraseña o de repetir contraseña, se ve o se oculta.
    var codificar = 0;
    $("#codificarDecodificar, #codificarDecodificar2").on("click", function () {


        if (codificar == 0) {

            //Cambias el input de contraseña de password a texto
            $("#password").attr({type: "text"});
            //Eliminas el icono del ojo cerrado
            $("#codificarDecodificar").removeClass('glyphicon-eye-close');
            //Añades el icono del ojo abierto (ahora se ve la contraseña)
            $("#codificarDecodificar").addClass('glyphicon-eye-open');

            //Mismo paso que con el input de contraseña pero con el de repetir contraseña
            $("#repetirpassword").attr({type: "text"});
            $("#codificarDecodificar2").removeClass('glyphicon-eye-close');
            $("#codificarDecodificar2").addClass('glyphicon-eye-open');

            codificar = 1;
        } else {
            if (codificar == 1) {

                //En este momento la contraseña es tipo texto, en cuanto le vuelves a clicar cambia
                //y se pone de tipo texto a tipo password
                $("#password").attr({type: "password"});

                //Eliminas el icono del ojo abierto
                $("#codificarDecodificar").removeClass('glyphicon-eye-open');

                //Añades el icono del ojo cerrado (ahora no se ve la contraseña)
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


@include ('PhpAuxiliares/cabeceraregistro')


<div class="tituloformularioregistro">
    <h2 class="colorGris">Formulario registro</h2>
</div>

<div class="alert alert-danger registroerror" >El correo ya esta en uso</div>

<div class="divregistro row">

    <!-- 4 PRIMERAS COLUMNAS EN BLANCO-->
    <!-- PARTE REGISTRO DE LOS INPUTS 4 COLUMNAS -->
    <div class="col-md-push-4 col-md-4">
        
        <form action="registrar" method="POST">
            {!! csrf_field() !!}

                    <!-- Input Nombre -->
            <label class="letrasblancas" for="nombre">Nombre</label>
            <div class="input-group margenRegistro">
                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                <input type="text" name="nombre" title="nombre"
                       id="nombre" placeholder="Nombre" onblur="validarNombre(this)"
                       class="form-control" required>
            </div>

            <!-- Input Apellidos -->
            <label class="letrasblancas" for="apellidos">Apellidos</label>
            <div class="input-group margenRegistro">
                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                <input type="text" name="apellidos" title="apellidos"
                       id="apellidos" placeholder="Apellidos" onblur="validarApellido(this)"
                       class="form-control" required>
            </div>

            <!-- Input Email -->
            <label class="letrasblancas" for="email">Email</label>
            <div class="input-group margenRegistro">
                <span class="input-group-addon">@</span>
                <input type="email" name="email" title="email"
                       id="email" placeholder="Email" onblur="validarEmail(this)"
                       class="form-control" required>
            </div>

            <!-- Input Contraseña -->
            <label class="letrasblancas" for="password">Contraseña</label>
            <div class="input-group margenRegistro">
                <span class="input-group-addon" id="span1"><i class="glyphicon glyphicon-eye-close" id="codificarDecodificar"></i></span>
                <input type="password" name="password" title="contraseña"
                       id="password" placeholder="Contraseña" onblur="comprobarLongitudPass(this)"
                       class="form-control" required>
            </div>

            <!-- Input repetir Contraseña -->
            <label class="letrasblancas" for="repetirpassword">Repetir contraseña</label>
            <div class="input-group margenRegistro">
                <span class="input-group-addon"><i class="glyphicon glyphicon-eye-close" id="codificarDecodificar2"></i></span>
                <input type="password" name="repetirpassword" title="Repetir contraseña"
                       id="repetirpassword" placeholder="Repita la contraseña" onblur="comprobarLongitudPass(this)"
                       class="form-control" required>
            </div>
            
            
            <div class="centrarbotonesregistro">

                <!--Boton registrar-->
                <input type="submit" name="registrar" id="registrar"  
                       value="Registrar" class="btn btn-primary botonregistro">

                <!--Boton reiniciar formulario-->
                <input type="reset" name="reiniciar" id="reiniciar"
                       value="Reiniciar" class="btn btn-default botonregistro">

            </div>

        </form>
        
    </div>

    <!-- RESPETAMOS LAS 4 PRIMERAS COLUMNAS EN BLANCO-->
    <div class="col-md-push-4 col-md-4">
        
        <!-- Validación Nombre -->
        <div class="validacionRegistro">
            <span class=""  id="textoNombre"></span>
        </div>

        <!-- Validación Apellido -->
        <div class="validacionRegistro">
            <span class="" id="textoApellido"></span>
        </div>

        <!--  -->
        <div class="validacionRegistro">
            <span class="" id="textoEmail"></span>
        </div>

        <!--  -->
        <div class="validacionRegistro">
            <span class="" id="textoPassword"></span>
        </div>

        <!-- Validación Contraseña -->
        <div class="validacionRegistro">
            <span class="" id="textoPasswordRepetida"></span>
        </div>
    </div>
</div>

@endsection


@section('footer')

    @include ('PhpAuxiliares/footer')

@endsection
