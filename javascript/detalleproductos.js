 $(document).ready(function() {

	            
                $('#lista').change(function(){
				
				var temp = $('#lista :selected').text();
				var temp_id=$('#lista :selected').val();
				$('.estado').val(temp_id);
                $('#producto_muestra').text(temp);
				
				$.post("llamada_detallesprod.php",{nombre:temp_id},function(data){
				$('#com1').val(data.detalle1);
				$('#com2').val(data.detalle2);
				$('#com3').val(data.detalle3);
				}, "json");
				
				
				$.post("dibujado_img.php",{nombre:temp_id},function(data){
				if(data.e1==1)
				{document.getElementById("img_1").src="images/"+data.nom+"-1.jpg";}
				if(data.e1!=1)
				{document.getElementById("img_1").src="images/no_image.jpg";}
				
				if(data.e2==1)
				{document.getElementById("img_2").src="images/"+data.nom+"-2.jpg";}
				if(data.e2!=1)
				{document.getElementById("img_2").src="images/no_image.jpg";}
				
				if(data.e3==1)
				{document.getElementById("img_3").src="images/"+data.nom+"-3.jpg";}	
				if(data.e3!=1)
				{document.getElementById("img_3").src="images/no_image.jpg";}				
				}, "json");
				
				});
				
                
					
				$('.envio_img').submit(function(){				
				if($('#foto1').val()=="" && $('#foto2').val()=="" && $('#foto3').val()=="")
				{alert("No hay ninguna imagen");}
				
				else
				{
				$.post("registroimagenes.php",{nombre:temp_id},function(data){
				$('#com1').val(data.detalle1);
				$('#com2').val(data.detalle2);
				$('#com3').val(data.detalle3);
				}, "json");
				
				return false;				
				}
				
				
				});			

                				
				
				
		    $('#registro').submit(function() {
            $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function() {
            alert('Datos guardados correctamente');
            }
            });        
            return false;
            }); 
				
				
				
				
				
				
				
				
				
	
   });
    



   
   