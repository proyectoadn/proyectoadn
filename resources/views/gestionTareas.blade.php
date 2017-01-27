
@extends('maestra')

@section('titulo')
Gestión de tareas
@endsection

@section('contenido')

<div class="row">
    <div class="contenedorPrincipal">
        <!--div que contiene los cargos y las categorias-->
        <div class="cargoCat">
            <div class='divBotonCargoCat'>
                <select name="1" size="" class='botonCargoCat form-control'>
                    <option value="1">Cargo1</option>
                    <option value="2">Cargo2</option>
                    <option value="3">Cargo3</option>
                </select>
            </div>
            <div class='divBotonCargoCat'>
                <select name="cargos" size="" class='botonCargoCat form-control'>
                    <option value="1">Cargo1</option>
                    <option value="2">Cargo2</option>
                    <option value="3">Cargo3</option>
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
