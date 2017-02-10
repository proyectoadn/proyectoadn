
@extends('../maestra')

@extends('../maestra')

@section('titulo')
    Gestión de tareas
@endsection

@section('js')
    <script>

        var id_rol;

        $(function () {
        //Codigo Nazario
        $("#carg").on("change", function () {


            $("#item1").html('');
            $("#item2").html('');

            var id = $(this).val();
            id_rol = id;
            var idjson = JSON.stringify(id);

            $.post("../resources/views/PhpAuxiliares/categorias.php", {rol: idjson},
                    function (respuesta) {


                        var categorias = JSON.parse(respuesta);

                        $("#cat").html('<option id="categorias" value="-1">-Elige categoria-</option>');
                        for (var i = 0; i < categorias.length; i++) {
                            $("#cat").append('<option value=' + categorias[i]['id'] + '>' + categorias[i]['descripcion'] + '</option>');
                        }

                    }).fail(function (jqXHR) {
                alert("Error de tipo " + jqXHR.status);
            });
        });


        $("#cat").on("change", function () {

            var id = $(this).val();
            var vector = new Array();
            vector.push(id);
            vector.push("<?php echo $id_user ?>");
            vector.push(id_rol);
            var idjson = JSON.stringify(vector);

            $.post("../resources/views/PhpAuxiliares/tareas.php", {id: idjson},
                    function (respuesta) {
                        var tarea = JSON.parse(respuesta);
                        $("#item1").html('');
                        $("#item2").html('');


                        for (var i = 0; i < tarea.length; i++) {
                            if (tarea[i]['estado'] == 1) {
                                $("#item1").append('<div value="' + tarea[i]['id'] + '" id="tareas" class="panel panel-primary tarea"><p class="textotarea">' + tarea[i]['descripcion'] + '</p><p class="textotarea"><a href="">' + tarea[i]['modelo'] + '</a></p>\n\
                            <div style="height: 25px; width: 32px; float: right; margin: 0px; padding: 0px; position: relative;">\n\
                            <button class="" onclick="popup(this)" value="' + tarea[i]['id'] + '" id="comentario" style="width:100%; height:100%; background: transparent; border: 0px; margin:0px;">\n\
                            <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/></button>\n\
                            </div></div>');
                            } else if (tarea[i]['estado'] == 2) {
                                $("#item2").append('<div value="' + tarea[i]['id'] + '" id="tareas" class="panel panel-primary tarea"><p class="textotarea">' + tarea[i]['descripcion'] + '</p><p class="textotarea"><a href="">' + tarea[i]['modelo'] + '</a></p>\n\
                            <div style="height: 25px; width: 32px; float: right; margin: 0px; padding: 0px; position: relative;">\n\
                            <button class="" onclick="popup(this)" value="' + tarea[i]['id'] + '" id="comentario" style="width:100%; height:100%; background: transparent; border: 0px; margin:0px;">\n\
                            <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/></button>\n\
                            </div></div>');
                            } else if (tarea[i]['estado'] == 3) {
                                $("#item3").append('<div value="' + tarea[i]['id'] + '" id="tareas" class="panel panel-primary tarea"><p class="textotarea">' + tarea[i]['descripcion'] + '</p><p class="textotarea"><a href="">' + tarea[i]['modelo'] + '</a></p>\n\
                            <div style="height: 25px; width: 32px; float: right; margin: 0px; padding: 0px; position: relative;">\n\
                            <button class="" onclick="popup(this)" value="' + tarea[i]['id'] + '" id="comentario" style="width:100%; height:100%; background: transparent; border: 0px; margin:0px;">\n\
                            <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/></button>\n\
                            </div></div>');
                            }
                        }

                    }).fail(function (jqXHR) {
                alert("Error de tipo " + jqXHR.status);
            });
        });
        });



    </script>

@endsection
@section('contenido')
<div class="container">
    <div class="tituloElegirRol">
        <h2>Elegir rol de acceso</h2>
    </div>
    <div class="row">
        Administrar
    </div>
</div>
@endsection
