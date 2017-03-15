@extends('../maestra')

@section('titulo')
Gestión de tareas
@endsection


<link rel="stylesheet" type="text/css" href="{!! asset('css/estilos.css') !!}"/>
<link rel="stylesheet" type="text/css" href="{!! asset('css/estiloFlex.css') !!}"/>


@section('contenido')

@include ('PhpAuxiliares/cabeceraadministrador')

<div>
    
    <div class="panel panel-primary login">
        <div class="panel-body">

            <div class="panel-footer">
                
                <h3>Foto recortada correctamente.</h3>
                
            </div>
            
        </div>
        
    </div>

</div>

@endsection


@section('footer')

@include ('PhpAuxiliares/footer')

@endsection