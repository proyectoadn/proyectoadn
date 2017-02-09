
@extends('maestra')

@section('titulo')
Login
@endsection

@section('contenido')

<script src="jquery-2.1.4.js"></script>
<script src="jquery-ui.min.js"></script>


<div class="container">
    <div class="panel panel-primary login">
        <div class="panel-body">
            <h2 class="form-signin-heading">Has olvidado la contraseña</h2>
        </div>
        <div class="panel-footer">
            <form action="enviarcorreo" method="POST">
                {!! csrf_field() !!}

                <div class="input-group" style="margin-bottom: 5px;">
                    <span class="input-group-addon">@</span>
                    <input type="text" name="email" placeholder="Introduce tu email" class="form-control">
                </div>
                <br>
                <input type="submit" name="enviar" value="Enviar" class="btn btn-primary">
            </form>

        </div>
    </div>
</div>
@endsection
