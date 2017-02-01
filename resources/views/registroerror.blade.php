
@extends('maestra')

@section('titulo')
Registro
@endsection
<script>

    //Nada más entrar, deja el foco en el primer campo del formulario, el nombre
    window.onload = function () {
        document.getElementById("email").focus();
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
