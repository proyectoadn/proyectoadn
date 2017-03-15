@extends('../maestra')

@section('titulo')
Gestión de tareas
@endsection

<link href="https://fonts.googleapis.com/css?family=Rokkitt" rel="stylesheet">


@include ('PhpAuxiliares/cabecera')


@section('contenido')


<div class="divpaginainicio">

    <div class="row">

        <div class="col-md-6">


        </div>
        
        <div class="col-md-6 divinformacionpaginainicio">
            
            <img src="Imagenes/Logos/logoPaginaInicio.png">
            
            <p class="descripcionpaginainicio">
                <label>¡Bienvenido a Gety!</label> el gestor de tareas y documentación de calidad orientado a instituciones academicas. Recuerda con un simple vistazo y cambia de estados tus tareas asignadas simplemente arrastrandolas.
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