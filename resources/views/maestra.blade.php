<!DOCTYPE html>
<html>
    <head>
        <title>@yield('titulo')</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/bootstrap.min.css') !!}"/>


        <script src="assets/js/jquery.min.js"></script>
        <script src="jquery-2.1.4.js"></script>
        <script src="jquery-ui.min.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="{{ URL::asset('js/funciones.js') }}"></script>
        <!--<script type="text/javascript" src="{{ URL::asset('js/captchaAPI.js') }}"></script>-->



        <link rel="stylesheet" type="text/css" href="{!! asset('css/estilos.css') !!}"/>
        <link rel="stylesheet" type="text/css" href="{!! asset('css/estiloFlex.css') !!}"/>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        @yield('js')
    </head>
    <body>



        <div>
            @yield('contenido')
        </div>

    </body>

    <footer>

        @yield('footer')
    </footer>
</html>
