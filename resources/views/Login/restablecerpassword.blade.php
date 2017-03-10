
@extends('../maestra')

@section('titulo')
Login
@endsection

@section('contenido')

<script>

    window.onload = function () {


        var codificar = 0;
        $("#codificarDecodificar, #codificarDecodificar2").on("click", function () {

            //Muestra la contraseña con caracteres
            if (codificar == 0) { //Muestra la contraseña con caracteres
                $("#password").attr({type: "text"});
                $("#codificarDecodificar").removeClass('glyphicon-eye-close');
                $("#codificarDecodificar").addClass('glyphicon-eye-open');

                $("#repetirpassword").attr({type: "text"});
                $("#codificarDecodificar2").removeClass('glyphicon-eye-close');
                $("#codificarDecodificar2").addClass('glyphicon-eye-open');

                codificar = 1;
            } else { //Oculta la contraseña con puntos.
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

    function comprobarLongitudPass2(control) {
        var pass = document.getElementById('password').value;
        var passRepetida = document.getElementById('repetirpassword').value;

        //Comprueba si ambas contraseñas coinciden, si no, pinta los campos de rojo y no desabilita el boton del formulario.
        if (control.value.length < 8 || pass !== passRepetida) {
            var capa = document.getElementById("textoPassword");
            capa.innerHTML = "<div class='alert alert-danger' ><img src='Imagenes/registro/x.png' alt='Correcto' style='width: 16px; height: 16px;' />  Al menos 8 caracteres y las contraseñas deben ser iguales</div>";
            document.getElementById('textoPassword').style.color = 'red';
            document.getElementById('password').style.color = 'red';
            document.getElementById('repetirpassword').style.color = 'red';
            document.getElementById('registrar').disabled = true;

        } else { //Si las contraseñas coinciden, pinta los campos de verde y habilita el boton.

            document.getElementById('password').style.color = 'green';
            document.getElementById('repetirpassword').style.color = 'green';
            var capa = document.getElementById("textoPassword");

            capa.innerHTML = "<div class='alert alert-success' ><img src='Imagenes/registro/v.png' alt='Correcto' style='width: 16px; height: 16px;' />  Contraseña correcta</div>";
            document.getElementById('registrar').disabled = false;
        }
    }
</script>


<div class="container">
    <div class="panel panel-primary login">
        <div class="panel-body">
            <h2 class="form-signin-heading">Restablecer contraseña</h2>
        </div>
        <div class="panel-footer">
            <form action="restablecer" method="POST">
                {!! csrf_field() !!}

                <label for="email">Email</label>
                <div class="input-group inputsrestablecerpassword">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                    <input id="email" type="text" name="email" value="{!! $_GET['correo'] !!}" class="form-control" readonly>
                </div>


                <div class="">
                    <span class="" id="textoPassword"></span>
                </div>


                <label for="password">Contraseña</label>
                <div class="input-group inputsrestablecerpassword">
                    <span class="input-group-addon"><i id="codificarDecodificar" class="glyphicon glyphicon-eye-close"></i></span>
                    <input type="password" name="password" id="password" placeholder="Escribe tu contraseña" onblur="comprobarLongitudPass2(this)" class="form-control">
                </div>

                <label for="repetirpassword">Repetir contraseña</label>
                <div class="input-group inputsrestablecerpassword">
                    <span class="input-group-addon"><i id="codificarDecodificar2" class="glyphicon glyphicon-eye-close"></i></span>
                    <input type="password" name="repetirpassword" id="repetirpassword" placeholder="Vuelve a escribir tu contraseña" onblur="comprobarLongitudPass2(this)" class="form-control">
                </div>

                <br>

                <input type="submit" name="restablecerpassword" value="Restablecer" class="btn btn-primary">
                <input type="reset" name="reiniciar" value="Reiniciar" class="btn btn-primary">

            </form>

        </div>
    </div>
</div>
@endsection
