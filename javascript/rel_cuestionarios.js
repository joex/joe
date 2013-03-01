$(document).ready(function(){

$('body').delegate(".editar", "click", function(){
var name=$(this).parent().parent().children(':first-child').text();
var selid=$(this).parent().children(':last-child').val();
window.location='Creacion de Evaluaciones/evaluacionesact.php?actuaideval='+selid+'';
//editar
});

//DESACTIVAR//
$('body').delegate(".desactivar", "click", function(){

var val=0;
var name=$(this).parent().parent().children(':first-child').text();

$.ajax({
type: 'POST',
url: 'Creacion de Evaluaciones/desactivar.php',
data: {value : val , nombre : name},
success: function(data){
$('#tab').empty();
$('#tab').append(data);

}
});
return false;
});
//ACTIVAR//
$('body').delegate(".activar", "click", function(){

var val=1;
var name=$(this).parent().parent().children(':first-child').text();

$.ajax({
type: 'POST',
url: 'Creacion de Evaluaciones/desactivar.php',
data: {value : val , nombre : name},
success: function(data){
$('#tab').empty();
$('#tab').append(data);

}
});
return false;
});

//NUEVO//
$('#nuevo').click(function(){
//$('#table').append('<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type="button" id="editar" value="EDITAR"><input type="button" id="desactivar" value="DESACTIVAR"></td></tr>');
   window.location="Creacion de Evaluaciones/evaluaciones.php";//nuevo
});


});