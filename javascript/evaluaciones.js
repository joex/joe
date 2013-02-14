$(document).ready(iniciar);

function iniciar()
{
$("#newp").on("click",nuevo);
$("#guardar").on("click",guardar);

}

function nuevo(){
        $("#campos").append("<tr class='bye'>"+
        "<td><textarea class='pregunta' name='preg[]' rows='4' cols='40' placeholder='Ingrese una pregunta' required ></textarea></td>"+
        "<td><select class='tipo' name='tipo[]'><option value='r'>radiobuttom</option><option value='c'>checkbox</option></select></td>"+
        "<td>OPCIONES <input type='button' value='+' onclick='nuevaopcion(this)' class='btnaumentar'></td>"+
        "<td><input type='button' value='Eliminar' onclick='eliminar(this)' class='btneliminar'></td>"+
        "</tr>");
}

function nuevaopcion(p){
$(p).parent().append("<tr><td><input type='text' name='respuesta[]' class='opcion'></td><td><input type='text' name='puntaje[]' class='puntaje'></td></tr>");

}

function eliminar(e){
    $(e).parent().parent().remove();
}

