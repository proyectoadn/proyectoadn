@extends('../maestra')

@section('titulo')
Perfil
@endsection


<link rel="stylesheet" type="text/css" href="{!! asset('css/estilos.css') !!}"/>
<link rel="stylesheet" type="text/css" href="{!! asset('css/estiloFlex.css') !!}"/>


@if(\Session::get('rol') == 'Administrador')

    @include ('PhpAuxiliares/cabeceraadministrador')
@else

    @include ('PhpAuxiliares/cabecera')
@endif
 

@section('contenido')

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