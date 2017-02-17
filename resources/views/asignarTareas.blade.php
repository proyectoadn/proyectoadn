@extends('../maestra')

@section('titulo')
Administracion
@endsection


@section('js')

@endsection


@section('contenido')

@include ('PhpAuxiliares/cabeceraadministrador')

<div class="contenedorPrincipal">
    <!--div que contiene los cargos y las categorias-->
    <div class="cargoCat">
        <div class='divBotonCargoCat'>
            <select id="carg" class='botonCargoCat form-control'>
                <option value="-1">-Elige cargo-</option>

            </select>
        </div>
    </div>

    <div class='limpiar'></div>
    <!-- DIVISOR ROW DE TODO -->
    <div class="row">
         <!-- DIVISOR IZQUIERDA -->
        <div class="col-md-6 ">
            <div class="item cajaAsignarTareas">
                <b>Tareas</b>
                <div class="checkbox margenIzqAsignarDoc">
                    <label class="displayBock">
                        <input type="checkbox" value="">
                        Tarea XXXXXXXXXXXXXXXXXXX
                    </label>
                    <label class="displayBock">
                        <input type="checkbox" value="">
                        Tarea XXXXXXXXXXXXXXXXXXX
                    </label>
                    <label class="displayBock">
                        <input type="checkbox" value="">
                        Tarea XXXXXXXX asd asd asdasdasdasd asd asd aasXXXXXXXXXXX
                    </label>
                    <label class="displayBock">
                        <input type="checkbox" value="">
                        Tarea XXXXXXsss ssssssssss diyasdad a ds da sd asd aiusd paiudsy paXXXXXXXXXXXXX
                    </label>
                    <label class="displayBock">
                        <input type="checkbox" value="">
                        Tarea XXXXXXXXXXXXXXXXXXX
                    </label>
                </div>
            </div>
        </div>



        <!-- coge la mitad derecha -->
        <div class="col-md-6 ">
            <!-- Lo pinta de gris y le pone un alto minimo -->
            <div class="item cajaAsignarTareas">
                <!-- Pongo clase row para dividirlo en la mitad, usuarios y categorias -->
                <div class="row">
                    
                    <!-- divisor para usuarios -->
                    <div class="col-md-6">
                        <b>Usuarios</b>
                        <div class="checkbox">
                            <label class="displayBock">
                                <input type="checkbox" value="">
                                Tarea XXXXXXsss ssssssssss sssssssXXXXXXXXXXXXX
                            </label>
                            <label class="displayBock">
                                <input type="checkbox" value="">
                                Tarea XXXXXXsss ssssssssss sssssssXXXXXXXXXXXXX
                            </label>
                            <label class="displayBock">
                                <input type="checkbox" value="">
                                Tarea XXXXXXsss ssssssssss sssssssXXXXXXXXXXXXX
                            </label>
                        </div>
                    </div>

                    <!-- divisor para roles -->
                    <div class="col-md-6">
                        <b>Roles</b>
                        <div class="checkbox">
                            <label class="displayBock">
                                <input type="checkbox" value="">
                                Tarea XXXXXXsss ssssssssss sssssssXXXXXXXXXXXXX
                            </label>
                            <label class="displayBock">
                                <input type="checkbox" value="">
                                Tarea XXXXXXsss ssssssssss sssssssXXXXXXXXXXXXX
                            </label>
                            <label class="displayBock">
                                <input type="checkbox" value="">
                                Tarea XXXXXXsss ssssssssss sssssssXXXXXXXXXXXXX
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="alert alert-danger borrardocumentacion">

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
