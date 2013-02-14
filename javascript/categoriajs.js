
$(document).ready(function() {
//nuevo item
$("#nitem").click(function(){
$("#temppp").val("nuevo");
$("#rellena").css('display','block');
$("#idcategoria").val("");		
});
//guardando datos
$('#registro').submit(function()
{$("#temp0").val($('#idpadre :selected').text());//guardando el texto del select en un hidden
});
//modificando los datos
$('#modificar').click(function(){
	//$("#idpadre").load("impseleccionrec.php"); //select inferior
	var nameee=$('#lista :selected').text();
	$("#temppp").val("actua");
	$("#rellena").css('display','block');
	
	$.post("ajax_categorias.php",{nombre:nameee}, function(data){	
	var nomb=data.nombrew;
	var dat=data.padr;
	var est=data.esta;
	
	$("#idcategoria").val(nomb);
	$("#idestado").val(est);
	$("#idpadre").val(dat);
	$("#tempus").val(nameee);
	
	}, "json");
	});	










});