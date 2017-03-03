/**
 * Created by Alber on 27/01/2017.
 */

/* VALIDAR NOMBRE DEL REGISTRO */

var caracteres = 250;
function validarNombre(control) {
    if (control.value == "") {

        document.getElementById('nombre').style.color = 'red';
        //Si está vacío, cojo el span, lo cambio de color y meto como texto incorrecto
        var capa = document.getElementById("textoNombre");
        document.getElementById('textoNombre').style.color = 'red';
        capa.innerHTML = "<div class='alert alert-danger' style='height: 34px; padding: 6px 12px;'><img src='Imagenes/registro/x.png' alt='Correcto' style='width: 16px; height: 16px;' />  Introduzca el nombre</div>";
        document.getElementById('registrar').disabled = true;
    } else {
        document.getElementById('nombre').style.color = 'green';
        //Cojo el span y lo dejo con texto vacío porque es correcto
        var capa = document.getElementById("textoNombre");
        capa.innerHTML = "<div class='alert alert-success' style='height: 34px; padding: 6px 12px;'><img src='Imagenes/registro/v.png' alt='Correcto' style='width: 16px; height: 16px;' />  Nombre correcto</div>";
    }
}

function validarApellido(control) {
    if (control.value == "") {

        document.getElementById('apellidos').style.color = 'red';
        //Si está vacío, cojo el span, lo cambio de color y meto como texto incorrecto
        var capa = document.getElementById("textoApellido");
        document.getElementById('textoApellido').style.color = 'red';
        capa.innerHTML = "<div class='alert alert-danger' style='height: 34px; padding: 6px 12px;'><img src='Imagenes/registro/x.png' alt='Correcto' style='width: 16px; height: 16px;' />  Introduzca el apellido</div>";
        document.getElementById('registrar').disabled = true;
        document.getElementById('registrar').disabled = true;
    } else {
        document.getElementById('apellidos').style.color = 'green';
        //Cojo el span y lo dejo con texto vacío porque es correcto
        var capa = document.getElementById("textoApellido");
        capa.innerHTML = "<div class='alert alert-success' style='height: 34px; padding: 6px 12px;'><img src='Imagenes/registro/v.png' alt='Correcto' style='width: 16px; height: 16px;' />  Apellido correcto</div>";
    }
}

function validarEmail(control) {
    if (control.value == "") {

        document.getElementById('email').style.color = 'red';
        //Si está vacío, cojo el span, lo cambio de color y meto como texto incorrecto
        var capa = document.getElementById("textoEmail");
        document.getElementById('textoEmail').style.color = 'red';
        capa.innerHTML = "<div class='alert alert-danger' style='height: 34px; padding: 6px 12px;'><img src='Imagenes/registro/x.png' alt='Correcto' style='width: 16px; height: 16px;' />  Introduzca un email</div>";
        document.getElementById('registrar').disabled = true;
    } else {
        document.getElementById('email').style.color = 'green';
        //Cojo el span y lo dejo con texto vacío porque es correcto
        var capa = document.getElementById("textoEmail");
        capa.innerHTML = "<div class='alert alert-success' style='height: 34px; padding: 6px 12px;'><img src='Imagenes/registro/v.png' alt='Correcto' style='width: 16px; height: 16px;' />  Email Correcto</div>";
    }
}

function comprobarLongitudPass(control) {
    var pass = document.getElementById('password').value;
    var passRepetida = document.getElementById('repetirpassword').value;
    if (control.value.length < 8 || pass !== passRepetida) {
        var capa = document.getElementById("textoPassword");
        capa.innerHTML = "<div class='alert alert-danger' style='height: 73px;'><img src='Imagenes/registro/x.png' alt='Correcto' style='width: 16px; height: 16px;' />  Al menos 8 caracteres y las contraseñas deben ser iguales</div>";
        document.getElementById('textoPassword').style.color = 'red';
        document.getElementById('password').style.color = 'red';
        document.getElementById('repetirpassword').style.color = 'red';
        document.getElementById('registrar').disabled = true;
    } else {

        document.getElementById('password').style.color = 'green';
        document.getElementById('repetirpassword').style.color = 'green';
        var capa = document.getElementById("textoPassword");
        capa.innerHTML = "<div class='alert alert-success' style='height: 34px; padding: 6px 12px;'><img src='Imagenes/registro/v.png' alt='Correcto' style='width: 16px; height: 16px;' />  Contraseña correcta</div>";
        document.getElementById('registrar').disabled = false;
    }
}

//Seleccionar todos los checkboxes de los roles en la ventana de asignarTareas
function seleccionarRoles(source)
{
    checkboxes = document.getElementsByClassName('seleccionarRoles'); //obtenemos todos los controles del tipo Input
    for (i = 0; i < checkboxes.length; i++) //recoremos todos los controles
    {
        if (checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
        {
            checkboxes[i].checked = source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
        }
    }
}

function seleccionarCategorias(source)
{
    checkboxes = document.getElementsByClassName('seleccionarCategorias'); //obtenemos todos los controles del tipo Input
    for (i = 0; i < checkboxes.length; i++) //recoremos todos los controles
    {
        if (checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
        {
            checkboxes[i].checked = source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
        }
    }
}

function seleccionarEntrega(source)
{
    checkboxes = document.getElementsByClassName('seleccionarEntrega'); //obtenemos todos los controles del tipo Input
    for (i = 0; i < checkboxes.length; i++) //recoremos todos los controles
    {
        if (checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
        {
            checkboxes[i].checked = source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
        }
    }
}


//Seleccionar todos los checkboxes de las tareas en la ventana de asignarTareas
function seleccionarTareas(source)
{
    checkboxes = document.getElementsByClassName('seleccionarTareas'); //obtenemos todos los controles del tipo Input
    for (i = 0; i < checkboxes.length; i++) //recoremos todos los controles
    {
        if (checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
        {
            checkboxes[i].checked = source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
        }
    }
}

function seleccionarUsuarios(source)
{
    checkboxes = document.getElementsByClassName('seleccionarUsuarios'); //obtenemos todos los controles del tipo Input
    for (i = 0; i < checkboxes.length; i++) //recoremos todos los controles
    {
        if (checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
        {
            checkboxes[i].checked = source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
        }
    }
}