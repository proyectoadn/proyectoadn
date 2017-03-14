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

    $(document).ready (function() {
        
        

        function showCoords(c) {

            ejex = c.x;
            ejey = c.y;


            var anchoreal = document.getElementById("prueba").naturalWidth;
            var altoreal = document.getElementById("prueba").naturalHeight;
            

            var anchoenpantalla = $("#prueba").width();
            var altoenpantalla = document.getElementById("prueba").height;
            


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
        
        <?php
        
        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');
        
        
        ?>
        
        var vector = new Array();
        
        var id_usuario = {!! $usu->getId_usuario() !!};
        var nombreimagen = <?php echo "'".$nombrearchivo."'"?>;
        
        vector.push(id_usuario);
        vector.push(nombreimagen);
        
        var vectordatos = JSON.stringify(vector);
        


        $.post("../resources/views/PhpAuxiliares/recortarfoto.php", {datos: datos,vectordatos: vectordatos},
                function (respuesta) {
                    
                    window.location = "subirfoto";

                }
        ).fail(function (jqXHR) {
            alert("Error de tipo " + jqXHR.status);
        });

    }

</script>



@endsection


@section('contenido')

@include ('PhpAuxiliares/cabeceraadministrador')



<div>
    
    <div id="fotoperfil" class="divfoto">
        <img src="Imagenes/Fotosusuarios/{!! $id_usuario !!}/{!! $nombrearchivo !!}" id="prueba" style="width: 100%;">
    </div>
    
    <button type="button" name="guardar" class="btn btn-primary botonguardar" onclick="recortarfoto()">Guardar</button>
</div>

@endsection



@section('footer')

@include ('PhpAuxiliares/footer')

@endsection
