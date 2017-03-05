@extends('../maestra')

@section('titulo')
Administracion
@endsection


@section('js')


@endsection

@section('contenido')

@include ('PhpAuxiliares/cabeceraadministrador')


<div class="contenedorPrincipal margensuperior">
    <!--div que contiene los cargos y las categorias-->

    <div class='limpiar'></div>
    <!-- DIVISOR ROW DE TODO -->
    <div class="row">
        <!-- DIVISOR IZQUIERDA -->
        <div class="col-md-push-1 col-md-10">
            <div class="item cajaAsignarTareas">
                <b>Histórico de la aplicación</b>
                <textarea id="textoHistorico" name="textoHistorico" class="textoHistorico" value="" readonly
                          style="padding: 7px; height: 450px; border-left: none; border-top: solid 1px; border-bottom: solid 1px; overflow-y: scroll;">
<?php
$verHistorico = file('Log\historicoLog.txt');
for ($i = 0; $i < count($verHistorico); $i++) {
echo $verHistorico[$i];
}
?>  
</textarea>
            </div>
        </div>
    </div>
</div>



<div class="alert alert-danger borrardocumentacion">

</div>
@endsection

@section('footer')

@include ('PhpAuxiliares/footer')

@endsection
