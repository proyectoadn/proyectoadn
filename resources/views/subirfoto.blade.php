@extends('../maestra')

@section('titulo')
Gestión de tareas
@endsection

@section('js')


<script>
    
    var ejex;
    var ejey;
    var ancho;
    var alto;

    var x;
    var y;
    var a;
    var al;

    $(function () {

        function showCoords(c) {

            ejex = c.x;
            ejey = c.y;


            var anchoreal = document.getElementById("prueba").naturalWidth;
            var altoreal = document.getElementById("prueba").naturalHeight;

            var anchoenpantalla = $("#fotoperfil").width();
            var altoenpantalla = document.getElementById("fotoperfil").height;


            var escala = anchoreal / anchoenpantalla;


            var xreal = escala.toFixed(2) * ejex;
            var yreal = escala.toFixed(2) * ejey;

            var anchorecortar = escala.toFixed(2) * c.w;
            var altorecortar = escala.toFixed(2) * c.h;


            x = xreal;
            y = yreal;
            a = anchorecortar;
            al = altorecortar;
        }

        $("#prueba").Jcrop({
            onSelect: showCoords,
            setSelect: [150, 150, 50, 50],
            minSize: [150, 150, 50, 50],
            maxSize: [150, 150, 50, 50]
        });
    });

    function recortarfoto(c) {


        var cordenadas = new Array();
        cordenadas.push(x);
        cordenadas.push(y);
        cordenadas.push(a);
        cordenadas.push(al);
        var datos = JSON.stringify(cordenadas);


        $.post("../resources/views/PhpAuxiliares/recortarfoto.php", {cordenadas: datos},
                function (respuesta) {
                    
                    alert(respuesta);

                    $("#cambiarimagen").html('<img src="Imagenes/Fotosusuario/4/fotorecortada.jpg"');

                }
        ).fail(function (jqXHR) {
            alert("Error de tipo " + jqXHR.status);
        });

    }

</script>



@endsection


@section('contenido')

@include ('PhpAuxiliares/cabeceraadministrador')



<div class="">

    <button type="button" name="guardar" class="btn btn-primary" onclick="recortarfoto()">Guardar</button>
    <img src="Imagenes/Fotosusuarios/{!! $id_usuario !!}/{!! $nombrearchivo !!}" id="prueba" class="fotoperfil">
</div>

@endsection



@section('footer')

<div class="divfooter">

    Desarrollado por:

    Daniel Ramirez Ros -
    Alberto de la Plaza Ramos -
    Nazario Castillero Redondo<br>

    Copyright 2017 - Proyectoadn
</div>

@endsection
