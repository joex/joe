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
        "<td>OPCIONES<input type='hidden' name='agrupando[]'> <input type='button' value='+' onclick='nuevaopcion(this)' class='btnaumentar'></td>"+
        "<td><input type='button' value='Eliminar' onclick='eliminar(this)' class='btneliminar'></td>"+
        "</tr>");
		
}

function nuevaopcion(p){
$(p).parent().append("<table><tr><td><input type='text' name='respuesta[]' class='opcion'></td><td><input type='text' name='puntaje[]' class='puntaje'></td><td><input type='button' value='Eliminar' onclick='eliminar2(this)' class='btneliminar'></td></tr></table>");

//alert($(p).parent().children('tr').length);
$(p).prev().val($(p).parent().children('table').length);
}

function eliminar(e){

    $(e).parent().parent().remove();
	
}
function eliminar2(e){
i=$(e).parent().parent().parent().parent().parent().children('table').length;
$(e).parent().parent().parent().parent().parent().children('input').eq(0).val(i-1);
	//i=$(e).parent().parent().parent().children('tr').length;
	//$(e).parent().parent().parent().children('input').eq(0).val(i-1);
    $(e).parent().parent().parent().parent().remove();
	

	
}
