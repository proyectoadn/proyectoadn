
@extends('maestra')

@section('titulo')
Gestión de tareas
@endsection

@section('js')
    <script>


$(function(){
    $("#carg").change(function(){

        var id=$(this).val();
        var idjson=JSON.stringify(id);

        $.post("../resources/views/categorias.php", {rol: idjson},
                function (respuesta) {


                    var categorias=JSON.parse(respuesta);

                    $("#cat").html('<option id="categorias" value="-1">-Elige categoria-</option>');
                    for(var i=0;i<categorias.length;i++){
                        $("#cat").append('<option value='+categorias[i]['id']+'>'+categorias[i]['descripcion']+'</option>');
                    }

                }).fail(function (jqXHR) {
            alert("Error de tipo " + jqXHR.status);
        });
    });
});




    </script>
@endsection

@section('contenido')

<div class="row">
    <div class="contenedorPrincipal">
        <!--div que contiene los cargos y las categorias-->
        <div class="cargoCat">
            <div class='divBotonCargoCat'>
                <select id="carg" class='botonCargoCat form-control'>
                    <option value="-1">-Elige cargo-</option>
                    @for($i=0;$i<count($roles);$i++)
                        <option  value="{!! $roles[$i]->id_rol !!}">{!! $roles[$i]->descripcion !!}</option>
                    @endfor
                </select>
            </div>
            <div class='divBotonCargoCat'>
                <select id="cat" name="cargos" size="" class='botonCargoCat form-control'>
                    <option id="categorias" value="-1">-Elige categoria-</option>

                </select>
            </div>
        </div>
        <div class='limpiar'></div>


        <!--div que contiene todas las columnas-->
        <div class="contenedorColumnas">
            <!--1ra columna-->
            <div class="columna">
                <p>sgdasdasdgaosuiausgdasdasdgaosuiausgdasdasdgaosuiausgdasdasdgaosudasdgaosuydgauysdgpaiysdgpgdñiaus</p>
            </div>
            <!--2da columna-->
            <div class="columna">

            </div>

            <!--3ra columna-->
            <div class="columna">

            </div>

            <!--4ta columna-->
            <div class="columna">

            </div>

            <!--5ta columna-->
            <div class="columna">

            </div>
        </div>
    </div>
</div>


@endsection
