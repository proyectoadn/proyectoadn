
@extends('maestra')

@section('titulo')
Elección de rol
@endsection
<script>

    //Nada más entrar, deja el foco en el primer campo del formulario, el nombre
    window.onload = function () {
        document.getElementById("email").focus();
    };


    function validarNombre(control) {
        if (control.value == "") {

            document.getElementById('nombre').style.color = 'red';

            //Si está vacío, cojo el span, lo cambio de color y meto como texto incorrecto
            var capa = document.getElementById("textoNombre");
            document.getElementById('textoNombre').style.color = 'red';
            capa.innerHTML = "<div class='alert alert-danger' style='height: 34px; padding: 6px 12px;'><img src='Imagenes/registro/x.png' alt='Correcto' style='width: 16px; height: 16px;' />  Introduzca el nombre</div>";
            document.getElementById('registrar').disabled = true;

        } else {

            document.getElementById('nombre').style.color = 'green';

            //Cojo el span y lo dejo con texto vacío porque es correcto
            var capa = document.getElementById("textoNombre");
            capa.innerHTML = "<div class='alert alert-success' style='height: 34px; padding: 6px 12px;'><img src='Imagenes/registro/v.png' alt='Correcto' style='width: 16px; height: 16px;' />  Nombre correcto</div>";

        }
    }   

    function validarApellido(control) {
        if (control.value == "") {

            document.getElementById('apellidos').style.color = 'red';

            //Si está vacío, cojo el span, lo cambio de color y meto como texto incorrecto
            var capa = document.getElementById("textoApellido");
            document.getElementById('textoApellido').style.color = 'red';
            capa.innerHTML = "<div class='alert alert-danger' style='height: 34px; padding: 6px 12px;'><img src='Imagenes/registro/x.png' alt='Correcto' style='width: 16px; height: 16px;' />  Introduzca el apellido</div>";
            document.getElementById('registrar').disabled = true;
        } else {
            document.getElementById('apellidos').style.color = 'green';

            //Cojo el span y lo dejo con texto vacío porque es correcto
            var capa = document.getElementById("textoApellido");
            capa.innerHTML = "<div class='alert alert-success' style='height: 34px; padding: 6px 12px;'><img src='Imagenes/registro/v.png' alt='Correcto' style='width: 16px; height: 16px;' />  Apellido correcto</div>";
            document.getElementById('registrar').disabled = false;
        }
    }

    function validarEmail(control) {
        if (control.value == "") {

            document.getElementById('email').style.color = 'red';

            //Si está vacío, cojo el span, lo cambio de color y meto como texto incorrecto
            var capa = document.getElementById("textoEmail");
            document.getElementById('textoEmail').style.color = 'red';
            capa.innerHTML = "<div class='alert alert-danger' style='height: 34px; padding: 6px 12px;'><img src='Imagenes/registro/x.png' alt='Correcto' style='width: 16px; height: 16px;' />  El email ya está en uso</div>";
            document.getElementById('registrar').disabled = true;
        } else {
            document.getElementById('email').style.color = 'green';

            //Cojo el span y lo dejo con texto vacío porque es correcto
            var capa = document.getElementById("textoEmail");
            capa.innerHTML = "<div class='alert alert-success' style='height: 34px; padding: 6px 12px;'><img src='Imagenes/registro/v.png' alt='Correcto' style='width: 16px; height: 16px;' />  Email Correcto</div>"; 
            document.getElementById('registrar').disabled = false;
        }
    }

    function comprobarLongitudPass(control) {
        var pass = document.getElementById('password').value;
        var passRepetida = document.getElementById('repetirpassword').value;


        if (control.value.length < 8 || pass !== passRepetida) {
            var capa = document.getElementById("textoPassword");
            capa.innerHTML = "<div class='alert alert-danger' style='height: 34px; padding: 6px 12px;'><img src='Imagenes/registro/x.png' alt='Correcto' style='width: 16px; height: 16px;' />  Al menos 8 caracteres y deben ser iguales</div>";
            document.getElementById('textoPassword').style.color = 'red';
            document.getElementById('password').style.color = 'red';
            document.getElementById('repetirpassword').style.color = 'red';
            document.getElementById('registrar').disabled = true;

        } else {

            document.getElementById('password').style.color = 'green';
            document.getElementById('repetirpassword').style.color = 'green';
            var capa = document.getElementById("textoPassword");

            capa.innerHTML = "<div class='alert alert-success' style='height: 34px; padding: 6px 12px;'><img src='Imagenes/registro/v.png' alt='Correcto' style='width: 16px; height: 16px;' />  Contraseña correcta</div>";
            document.getElementById('registrar').disabled = false;
        }
    }

</script>

@section('contenido')
<div class="container divregistro">

    <div class="col-md-8 col-md-push-4">
        <div class="panel-body">
            <h2 class="form-signin-heading">Formulario registro</h2>
        </div>

        <form action="registrar" method="POST">
            <!-- Columna inputs-->
            <div class="col-md-6">
                <div class="alert alert-danger" >El email ya está en uso</div>
                <!-- Input Nombre -->
                <input type="text" name="nombre" title="nombre" 
                       id="nombre" placeholder="Nombre" onblur="validarNombre(this)" 
                       class="form-control" required style="margin-bottom: 5px;"> 

                <!-- Input Apellidos -->    
                <input type="text" name="apellidos" title="apellidos" 
                       id="apellidos" placeholder="Apellidos" onblur="validarApellido(this)" 
                       class="form-control" required style="margin-bottom: 5px;">

                <!-- Input Email -->    
                <input type="email" name="email" title="email" 
                       id="email" placeholder="Email" onblur="validarEmail(this)" 
                       class="form-control" required style="margin-bottom: 5px;">

                <!-- Input Contraseña -->    
                <input type="password" name="password" title="contraseña" 
                       id="password" placeholder="Contraseña" onblur="" 
                       class="form-control" required style="margin-bottom: 5px;">

                <!-- Input repetir Contraseña -->    
                <input type="password" name="repetirpassword" title="Repetir contraseña" 
                       id="repetirpassword" placeholder="Repita la contraseña" onblur="comprobarLongitudPass(this)" 
                       class="form-control" required style="margin-bottom: 5px;">

                captcha

                <br>

                <input type="submit" name="registrar" id="registrar"  
                       value="Registrar" class="btn btn-primary">

                <input type="reset" name="reiniciar" id="reiniciar"
                       value="Reiniciar" class="btn btn-primary">
            </div>

            <!-- Validación  -->
            <div class="col-md-6" style="height: 34px; padding: 6px 12px;">
                <span class=""  id="v"></span>
            </div>
            <!-- Validación  -->
            <div class="col-md-6" style="height: 34px; padding: 6px 12px;">
                <span class=""  id=""></span>
            </div>

            <!-- Validación Nombre -->
            <div class="col-md-6" style="height: 34px; padding: 6px 12px; margin-bottom: 5px;">
                <span class=""  id="textoNombre"></span>
            </div>

            <!-- Validación Apellido -->
            <div class="col-md-6" style="height: 34px; padding: 6px 12px; margin-bottom: 5px;">
                <span class="" id="textoApellido"></span>
            </div>

            <!--  -->
            <div class="col-md-6" style="height: 34px; padding: 6px 12px;margin-bottom: 5px;">
                <span class="" id="textoEmail"></span>
            </div>

            <!--  -->
            <div class="col-md-6" style="height: 34px; padding: 6px 12px; margin-bottom: 5px;">
                <span class="" id="textoPassword"></span>
            </div>

            <!-- Validación Contraseña -->
            <div class="col-md-6" style="height: 34px; padding: 6px 12px; margin-bottom: 5px;">
                <span class="" id="textoPasswordRepetida"></span>
            </div>
        </form>
    </div>

</div>
@endsection
