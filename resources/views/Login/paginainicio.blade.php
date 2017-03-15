@extends('../maestra')

@section('titulo')
Gestión de tareas
@endsection


@include ('PhpAuxiliares/cabecera')


@section('contenido')


<div class="divpaginainicio">

    <div class="row">

        <div class="col-md-6">


        </div>
        
        <div class="col-md-6 divinformacionpaginainicio">
            
            <img src="Imagenes/Logos/logoPaginaInicio.png">
            
            <p>
                Descripcion de la aplicacion.
            </p>
            
            <form action="seguir" method="POST">
                {!! csrf_field() !!}
                
                <button type="submit" name="seguir" class="btn btn-primary btn-lg">Seguir con la aplicacion <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </form>
        </div>

    </div>

</div>

@endsection


@section('footer')

@include ('PhpAuxiliares/footer')

@endsection