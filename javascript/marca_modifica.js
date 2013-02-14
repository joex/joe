$(document).ready(function(){

$("#modificar").click(function(){
$("#ocultocat").val("actua");
$("#marca").val($('#marcaselect :selected').text());
j=$('#marcaselect :selected').attr('class');

if(j=="inactivo"){$("#estado").val("0");}
if(j=="activo"){$("#estado").val("1");}
});
$("#nitem").click(function(){
$("#ocultocat").val("nuevo");
$("#marcaselect").val("0");
$("#marca").val("");
});

$("#registromarca").submit(function(){
if($("#ocultocat").val()=="actua"||$("#ocultocat").val()=="nuevo")
{
var x=$("#marca").val();
if (x==null || x=="")
	{alert("Ingrese un nombre de categoria");
	return false;}
	alert("Accion realizada con exito");
return true;

}
alert("No ha modificado ni creado nueva marca");
return false;
});
});
function validacion() {
var x=$("#marca").val();

if (x==null || x=="")
	{alert("Ingrese un nombre de categoria");
	return false;
	}
	}