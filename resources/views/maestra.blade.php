<!DOCTYPE html>
<html>
<head>
    <title>@yield('titulo')</title>

    <link rel="stylesheet" type="text/css" href="{!! asset("assets/css/bootstrap.min.css") !!}"/>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{!! asset("css/estilos.css") !!}"/>
    @yield('js')
</head>
<body>

    <div>
        @yield('contenido')
    </div>

</body>
</html>
