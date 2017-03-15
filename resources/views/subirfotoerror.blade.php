
@extends('../maestra')

@section('titulo')
Gestión de tareas
@endsection

@section('contenido')

@include ('PhpAuxiliares/cabecera')


<div>

    <div class="panel panel-primary login">
        <div class="panel-body">

            <div class="panel-footer">

                <div class="titulogeneralsubirfotoerror">

                    <h3>Error al subir el archivo, no es una foto o no tiene el formato jpg, intentalo de nuevo.</h3>
                </div>

            </div>

        </div>
    </div>


</div>

@endsection
