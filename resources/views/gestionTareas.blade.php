
@extends('maestra')

@section('titulo')
Gestión de tareas
@endsection

@section('contenido')


<div class="row">
    <div class="contenedorPrincipal">

        <!--div que contiene los cargos y las categorias-->
        <div class="cargoCat">
            <form action="" method="POST">
                {!! csrf_field() !!}
                <div class="col-md-6 botonRol">

                    <select name="cargo">
                        <option value="1">Cargo1</option>
                        <option value="2">Cargo2</option>
                        <option value="3">Cargo3</option>
                    </select>
                </div>
            </form>  
        </div>

        <!--div que contiene todas las columnas-->
        <div class="contenedorColumnas">
            <!--1ra columna-->
            <div class="columna">

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
