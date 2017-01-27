/**
 * Created by DAW2 on 27/01/2017.
 */
$(function(){


    $("#aceptar").on("click",function(){

        var nom = JSON.stringify($("#usuario").val());

        $.post("servidor.php",{n:nom},
            function(respuesta){



                if(respuesta === 'Existe'){

                    window.location = "Bienvenido.php";
                }
                else{

                    window.location = "index.php";
                }

            }).error( function(){
            alert("Error");
        });
    });
});