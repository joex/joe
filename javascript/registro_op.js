$(document).ready(function(){
//////////////////////////////////////
//SELECCION MOTIVOS
//////////////////////////////////////
//PRIMER FILTRO
$("#formselect").change(function(){
formt=$("#formselect :selected").val();
$.post("ajax_registro_op.php",{formtajax:formt,opcion:"f"},function(data){
$("#selectmot1").html(data.selmotv1);
},"json");
//limpiando
$("#selectmot2").html("<option>--------------------</option>");
$("#selectmot3").html("<option value='invalido'>--------------------</option>");
$("#selectmot").html("<option></option>");
});

//SEGUNDO FILTRO
$("#selectmot1").change(function(){
formt=$("#formselect :selected").val();
formt1=$("#selectmot1 :selected").text();
$.post("ajax_registro_op.php",{formt1ajax:formt1,opcion:"motv1",format:formt},function(data){
$("#selectmot2").html(data.selmotv2);
},"json");
//limpiando
$("#selectmot3").html("<option value='invalido'>--------------------</option>");
$("#selectmot").html("<option></option>");
});

//TERCER FILTRO
$("#selectmot2").change(function(){
formt=$("#formselect :selected").val();
formt1=$("#selectmot1 :selected").text();
formt2=$("#selectmot2 :selected").text();
$.post("ajax_registro_op.php",{formt1ajax:formt1,formt2ajax:formt2,opcion:"motv2",format:formt},function(data){
$("#selectmot3").html(data.selmotv3);
},"json");
//limpiando
$("#selectmot").html("<option></option>");
});

//CUARTO FILTRO
$("#selectmot3").change(function(){
formt=$("#formselect :selected").val();
formt1=$("#selectmot1 :selected").text();
formt2=$("#selectmot2 :selected").text();
formt3=$("#selectmot3 :selected").text();
$.post("ajax_registro_op.php",{formt1ajax:formt1,formt2ajax:formt2,formt3ajax:formt3,opcion:"motv3",format:formt},function(data){
$("#selectmot").html(data.selmotv);
},"json");

});

//////////////////////////////////////
//SELECCION PRODUCTOS
//////////////////////////////////////
//PRIMER FILTRO

$("#formselect").change(function(){
formt=$("#formselect :selected").val();
$.post("ajax_registro_op.php",{formtajax:formt,opcion:"fp"},function(data){
$("#selectprod1").html(data.selprod1);
},"json");
//limpiando
$("#selectprod2").html("<option>--------------------</option>");
$("#selectprod3").html("<option value='invalido'>--------------------</option>");
$("#selectprod").html("<option></option>");
});


//SEGUNDO FILTRO
$("#selectprod1").change(function(){
formt=$("#formselect :selected").val();
formt1=$("#selectprod1 :selected").text();
$.post("ajax_registro_op.php",{formt1ajax:formt1,opcion:"produ1",format:formt},function(data){
$("#selectprod2").html(data.selprod2);
},"json");
//limpiando
$("#selectprod3").html("<option value='invalido'>--------------------</option>");
$("#selectprod").html("<option></option>");
});

//TERCER FILTRO
$("#selectprod2").change(function(){
formt=$("#formselect :selected").val();
formt1=$("#selectprod1 :selected").text();
formt2=$("#selectprod2 :selected").text();
$.post("ajax_registro_op.php",{formt1ajax:formt1,formt2ajax:formt2,opcion:"produ2",format:formt},function(data){
$("#selectprod3").html(data.selprod3);
},"json");
//limpiando
$("#selectprod").html("<option></option>");
});

//CUARTO FILTRO
$("#selectprod3").change(function(){
formt=$("#formselect :selected").val();
formt1=$("#selectprod1 :selected").text();
formt2=$("#selectprod2 :selected").text();
formt3=$("#selectprod3 :selected").text();
$.post("ajax_registro_op.php",{formt1ajax:formt1,formt2ajax:formt2,formt3ajax:formt3,opcion:"produ3",format:formt},function(data){
$("#selectprod").html(data.selprod);
},"json");

});


$("#registro_mp").submit(function(){

//motivos
if($("#selectmot3 :selected").attr("value")=='invalido'||$("#selectprod3 :selected").attr("value")=='invalido')
{alert("Eliga un motivo y un producto");
return false;
}

$("#val1").val($("#selectmot").text());
$("#val2").val($("#selectprod").text());
alert("Datos guardados con exito");


});

});