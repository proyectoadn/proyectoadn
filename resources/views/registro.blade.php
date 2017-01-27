
@extends('maestra')

@section('titulo')
Elección de rol
@endsection

@section('contenido')

<div class="row">

    <div class="divregistro">

        <input type="text" name="nombre" placeholder="Nombre" class="form-control">
        <input type="text" name="apellidos" placeholder="Apellidos" class="form-control">
        <input type="text" name="email" placeholder="Email" class="form-control">
        <input type="text" name="password" placeholder="Contraseña" class="form-control">
        <input type="text" name="repetirpassword" placeholder="Confirmar contraseña" class="form-control">
        Captcha
        <input type="text" name="captcha" placeholder="Captcha" class="form-control">
        
    </div>
</div>
@endsection
