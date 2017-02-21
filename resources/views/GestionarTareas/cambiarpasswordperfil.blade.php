
@extends('../maestra')

@section('titulo')
Login
@endsection


@section('contenido')

<script src="jquery-2.1.4.js"></script>
<script src="jquery-ui.min.js"></script>

<script>

    //Nada más entrar, deja el foco en el primer campo del formulario, el nombre
    window.onload = function () {


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

@include ('PhpAuxiliares/cabeceraadministrador')


<div class="panel panel-primary divmiperfil">

    <div class="panel-body">
        <h2 class="form-signin-heading">Cambio de contraseña</h2>
    </div>

    <div class="panel-footer">
        <form action="cambiarpasswordperfil" method="POST">
            {!! csrf_field() !!}


            <div class="input-group" style="margin-bottom: 5px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-eye-close" id="codificarDecodificar"></i></span>
                <input type="password" id="password" name="contraseñaantigua" placeholder="Contraseña antigua" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-eye-close" id="codificarDecodificar2"></i></span>
                <input type="password" id="repetirpassword" name="password" placeholder="Contraseña nueva" class="form-control">
            </div>

            <div class="input-group" style="margin-bottom: 5px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-eye-close" id="codificarDecodificar2"></i></span>
                <input type="password" id="repetirpassword" name="repetirpassword" placeholder="Repetir contraseña nueva" class="form-control">
            </div>
            <br>

            <input class="btn btn-lg btn-primary btn-block" type="submit" value="Actualizar contraseña">

            <br>
        </form>
    </div>
</div>
@endsection
