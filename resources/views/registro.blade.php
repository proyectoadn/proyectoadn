
@extends('maestra')

@section('titulo')
Elección de rol
@endsection

@section('contenido')

<div class="divregistro">

    <form action="registrar" method="POST">

        <input type="text" name="nombre" placeholder="Nombre" class="form-control">
        <input type="text" name="apellidos" placeholder="Apellidos" class="form-control">
        <input type="text" name="email" placeholder="Email" class="form-control">
        <input type="password" name="password" placeholder="Contraseña" class="form-control">
        <input type="password" name="repetirpassword" placeholder="Confirmar contraseña" class="form-control">
        Captcha
        <input type="text" name="captcha" placeholder="Captcha" class="form-control">
        <br>

        <input type="submit" name="registrar" value="Registrar" class="btn btn-primary">
        <input type="reset" name="reiniciar" value="Reiniciar" class="btn btn-primary">
    </form>

</div>
@endsection
