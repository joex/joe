$(document).ready(function(){

	$('#tabsin' ).tabs({event: "mouseover"});

    $("#prods").change(function(){
	
	$('#tabs').empty();
	var ide= $('#prods :selected').val();
	

	$.ajax({
		
				type:"POST",
				url:"tabsventas.php",
				data: {id: ide},
				success:mostrar,
					
			    });
			    return false;
	});


	function mostrar (datos) {
	
	$('#tabs').append(datos);
	$('#tabsin' ).tabs({event: "mouseover"});	
		 
	};
    

	
});

	