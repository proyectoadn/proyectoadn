<!DOCTYPE html>
<html lang="es">
    <head>
        <title>@yield('titulo')</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/bootstrap.min.css') !!}"/>


        <script src="assets/js/jquery.min.js"></script>
        <script src="jquery-2.1.4.js"></script>
        <script src="jquery-ui.min.js"></script>
        
        
        

        <link rel="stylesheet" href="css/jquery.Jcrop.min.css" type="text/css"/>
        <script src="js/jquery.Jcrop.min.js"></script>
        
        
        

        <script src="assets/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="{{ URL::asset('js/funciones.js') }}"></script>
        <!--<script type="text/javascript" src="{{ URL::asset('js/captchaAPI.js') }}"></script>-->



        <link rel="stylesheet" type="text/css" href="{!! asset('css/estilos.css') !!}"/>
        <link rel="stylesheet" type="text/css" href="{!! asset('css/estiloFlex.css') !!}"/>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--FAVICON-->
        <link rel="icon"
              type="image/png"
              href="Imagenes/Logos/favicon.png">


        @yield('js')
    </head>
    <body id="idBody">



        <div>
            @yield('contenido')
        </div>

    </body>

    <footer>

        @yield('footer')
    </footer>
</html>
