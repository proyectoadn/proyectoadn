@extends('../maestra')

@section('titulo')
Administracion
@endsection


@section('js')

<script>
    $(function () {

        //Esta función resalta cualqier palabra dentro del textarea (por el textLog de resaltarTexto
        jQuery.fn.extend({
            resaltar: function (busqueda, claseCSSbusqueda) {
                var regex = new RegExp("(<[^>]*>)|(" + busqueda.replace(/([-.*+?^${}()|[\]\/\\])/g, "\\$1") + ')', 'ig');
                var nuevoHtml = this.html(this.html().replace(regex, function (a, b, c) {
                    return (a.charAt(0) == "<") ? a : "<span class=\"" + claseCSSbusqueda + "\">" + c + "</span>";
                }));
                return nuevoHtml;
            }
        });

        $('#filter').keyup(function (tecla) {
            resaltarTexto();
        });

        $('#filter').keydown(function (tecla) {
             if (tecla.keyCode == 8) {
                 limpiarBusqueda();
             }
        });

    });

    function resaltarTexto() {

        //Cojo el texto del divisor y lo meto en una variable
        var texto = $('#textoLog').html();

        //Elimino todos los <br>, <span class="resaltarTexto"> y </span> que haya
        //texto = texto.replace(/<br>/gi, '');
        texto = texto.replace(/<span class="resaltarTexto">/gi, '');
        texto = texto.replace(/<span class="">/gi, '');
        texto = texto.replace(/<p id="parrafo">/gi, '');
        texto = texto.replace(/<\/span>/gi, '');
        texto = texto.replace(/<\/p>/gi, '');


        $('#textoLog').html(texto);

        $("#textoLog").resaltar(filter.value, "resaltarTexto");
    }

    function limpiarBusqueda() {

        //Cojo el texto del divisor y lo meto en una variable
        var texto = $('#textoLog').html();

        //Elimino todos los <br>, <span class="resaltarTexto"> y </span> que haya
        //texto = texto.replace(/<br>/gi, '');
        texto = texto.replace(/<span class="resaltarTexto">/gi, '');
        texto = texto.replace(/<span class="">/gi, '');
        texto = texto.replace(/<p id="parrafo">/gi, '');
        texto = texto.replace(/<\/span>/gi, '');
        texto = texto.replace(/<\/p>/gi, '');


        $('#textoLog').html(texto);
        // Quita una clase
        $('span').removeClass('resaltarTexto');
    }

</script>


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
                <b>Histórico</b>
                <br>
                <div class='divBotonCargoCat' style="width: 20%; margin-bottom: 15px;">
                    <div class="input-group botonCargoCat" style="margin-left: 15px;">
                        <span class="input-group-addon">
                            Buscar
                        </span>
                        <input type="text" class="form-control" id="filter" name="filter">
                    </div>
                </div>
                <div id="textoLog" name="textoLog" class="textoLog searchable" value="" readonly
                     style="width: 100%; background-color: white; padding: 7px; height: 400px; border-left: none; border-top: solid 1px; border-bottom: solid 1px; overflow-y: scroll;">
<p id="parrafo">
<?php
$abrirLog = file('Log\historicoLog.txt');
for ($i = 0; $i < count($abrirLog); $i++) {
echo $abrirLog[$i] . '<br>';
}
?>
                    </p>
                </div>
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
