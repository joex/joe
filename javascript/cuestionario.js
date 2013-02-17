$(document).ready(function(){

$("#rec").click(function(){
var idg=$("#id_eval").val();
var items = [];
 $('input[type=radio]:checked').each(function(){ 
items.push($(this).attr('value')); 
items.push($(this).attr('name'));
});
$('input[type=checkbox]:checked').each(function(){ 
items.push($(this).attr('value')); 
items.push($(this).attr('name'));
});
var n2= $(".campo").length;
var n1=items.length;
var count=n1/2;

if(count>=n2)
{$.ajax({
      type: 'POST',
	  url: 'rec_eval.php',
	  data: {datos: items, id: idg},
	  success: function(){
      alert('GRABADO');
	  window.location="load_c.php";
	  }
});

}
else{
alert('COMPLETE TODOS LOS CAMPOS');
}

});
});