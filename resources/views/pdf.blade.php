


<link rel="stylesheet" type="text/css" href="{!! asset('css/estilos.css') !!}"/>
<link rel="stylesheet" type="text/css" href="{!! asset('css/estiloFlex.css') !!}"/>

<style>

    body{

        background-color: white;
    }


</style>


<div>

    <div class="titulogeneralpdf">

        <h3>Listado de las tareas</h3>
    </div>

    <br>


        <div>
            <h4>Por hacer:</h4>
        </div>

            @for($i=0;$i<count($porhacer);$i++)
                
                <div class="divtarea" id="porhacer">
                
                
                {!! $porhacer[$i]->descripcion !!}
                <br><br>
                {!! $porhacer[$i]->modelo !!}
                
                </div>
                <br>
            @endfor

        
    <br>

        <div>
            <h4>Pendiente</h4>
        </div>

            
            @for($i=0;$i<count($pendiente);$i++)
                
                <div class="divtarea" id="pendiente">
                
                
                {!! $pendiente[$i]->descripcion !!}
                <br><br>
                {!! $pendiente[$i]->modelo !!}
                
                </div>
                <br>
            @endfor
    <br>

        <div>
            <h4>Hecho</h4>
        </div>

        
            
            @for($i=0;$i<count($hecho);$i++)
                
                <div class="divtarea" id="hecho">
                
                
                {!! $hecho[$i]->descripcion !!}
                <br><br>
                {!! $hecho[$i]->modelo !!}
                
                </div>
                <br>
            @endfor
        
    <br>

</div>
