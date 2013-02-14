$(document).ready(function(){

	$("#filtrar").click(function(){
	
	var keyw = $("#find").val();
	var cate = $("#category").val();
	
	$.ajax({
	
			type:"POST",
			url:"findpubli.php",
			data: {key: keyw, cat: cate},
			success:mostrar,
				
		  });
		return false;
	});

	function mostrar (datos) {
	
	$("tbody").empty();
	$("tbody").append(datos);
			
	};
	
	$("tbody tr").live("click", function(){
        window.location = $(this).attr('href');
	});	
	
	});
	
