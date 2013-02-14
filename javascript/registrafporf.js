$(document).ready(iniciar);

function iniciar()
{$("#newp").on("click",nuevo);
$("#guardar").on("click",guardar);
$.post("ajaxregistrafporf.php",{},recibeform,"json");
$("#cambioform").on("click",ajaxcambiaformato);
}

function ajaxcambiaformato(){
//alert("holas");
captura=$("#selec :selected").val();
$.post("ajaxregistrafporf2.php",{vajax:captura},recibecampos,"json");
}

function recibecampos(data)
{$(".bye").remove();
if(data[0]=='1'&&data[1]=='1'&&data[2]=='1'){
	alert("Sin campos.");}
else{
	for(i=0;i<data[0].length;i++)
	{$("#campos").append("<tr class='bye'>"+data[0][i]+data[1][i]+data[2][i]+"<td><input type='button' value='Eliminar' onclick='eliminar(this)' class='btneliminar'></td>"+
	"</tr>");
	}
	}
}

function recibeform(data){
$("#selec").append(data);
}

function nuevo(){
        $("#campos").append("<tr class='bye'>"+
        "<td><input class='descripcion' name='desc[]' type='text' size='18' placeholder='Ingrese descripcion' required /></td>"+
        "<td><select class='tipo' name='tipo[]'><option value='t'>texto</option><option value='n'>numerico</option><option value='r'>radiobuttom</option><option value='s'>select</option><option value='c'>checkbox</option></select></td>"+
        "<td><input class='valores' name='val[]' type='text' size='40' placeholder='Valores'/></td>"+
        "<td><input type='button' value='Eliminar' onclick='eliminar(this)' class='btneliminar'></td>"+
        "</tr>")
}

function eliminar(e){
    $(e).parent().parent().remove();
}
