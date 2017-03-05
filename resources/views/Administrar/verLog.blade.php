@extends('../maestra')

@section('titulo')
Administracion
@endsection


@section('js')


<script>
    $(function () {

        //Funcion que se lanza al pinchar en el botón de guardarEnHistorico
        $('#guardarEnHistorico').on('click', function () {

            //Cojo el texto del textarea y lo meto ewn una variable
            var texto = $(textoLog).val();

            //Le paso al value del botón el texto para manejarlo en el controlador
            document.getElementById("guardarEnHistorico").value = texto;

            alert($(guardarEnHistorico).val());
        });

        //Funcion que se lanza al pinchar en el botón de verHistorico
        $('#verHistorico').on('click', function () {

            $("#hola").load("Log/log.txt");
        });

        //Filtro buscar algo en el textarea
        $('#filter').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('.searchable').hide();
            $('.searchable').filter(function () {
                return rex.test($(this).text());
            }).show();
        });

    });


</script>

@endsection

<?php
?>


@section('contenido')

@include ('PhpAuxiliares/cabeceraadministrador')


<div class="contenedorPrincipal margensuperior">
    <!--div que contiene los cargos y las categorias-->






    <div class='limpiar'></div>
    <!-- DIVISOR ROW DE TODO -->
    <div class="row">
        <!-- DIVISOR IZQUIERDA -->
        <div class="col-md-10 ">
            <div class="item cajaAsignarTareas">
                <b>Log</b>
                <br>
                <div class='divBotonCargoCat' style="width: 20%; margin-bottom: 15px;">
                    <div class="input-group botonCargoCat">
                        <span class="input-group-addon">
                            Buscar
                        </span>
                        <input type="text" class="form-control" id="filter" name="filter">
                    </div>
                </div>
                <textarea id="textoLog" name="textoLog" class="textoLog searchable" value="" readonly
                          style="padding: 7px; height: 400px; border-left: none; border-top: solid 1px; border-bottom: solid 1px; overflow-y: scroll;">
<?php
$abrirLog = file('Log\log.txt');
for ($i = 0; $i < count($abrirLog); $i++) {
echo $abrirLog[$i];
}
?>
</textarea>
            </div>
        </div>
        <!-- coge la mitad derecha -->
        <div class="col-md-2">

            <!-- Lo pinta de gris y le pone un alto minimo -->
            <div class="item cajaAsignarTareas" style="min-height: 150px;">
                <b>Histórico</b>
                <form action="guardarLog" method="POST">
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-primary guardarEnHistorico" id="guardarEnHistorico" name="guardarEnHistorico"
                            style="width: 90%; margin-left: 13px; margin-right: 10px; margin-bottom: 15px; margin-top: 15px;">
                        Guardar en Histórico
                    </button>
                </form>

                <form action="verHistorico" method="POST">
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-primary verHistorico" id="verHistorico" name="verHistorico"
                            style="width: 90%; margin-left: 13px; margin-right: 10px;">
                        Ver Histórico
                    </button>
                </form>
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
