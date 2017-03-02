@extends('../maestra')

@section('titulo')
Gestión de tareas
@endsection


@section('contenido')


<div>
    
    <h3>Listado de las tareas</h3>
    
    Por hacer:<br>
    
    {!! $tareas[0]->descripcion !!}
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
