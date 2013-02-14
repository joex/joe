$(document).ready(function() {

	$('#agregar').click(function()
	{ 
			var n=$("tr").length; 
			var prod = $('#lista :selected').text(); 
			var id_temp= $('#lista :selected').val();    
			var cont=0;      
			$('.prod_list').each(function()   
				{
					if($(this).text().match(prod))  
						{cont++;}    
				}
								);
                 
        if(n<5)  
		{
			if(cont==0)  
				{  		$('#lista_ing').append('<tr><td class="ordenando">'+n+'</td><td class="prod_list" id="prod'+n+'">'+prod+'</td><td class="eliminar">X</td></tr>');
						$('#prod'+n+'').data('temporal',id_temp);
       
					$('.eliminar').click(function()
						{   var i=0;       
							$(this).parent().remove(); 
							$('#agregar').removeAttr("disabled");
							
							$('.ordenando').each(function()    
							{
							i++;
							$(this).text(i);					
				            }
										     );
						}		
										);
				}
        
			if(cont!=0)
				{alert('El producto ya esta en la lista');
				}
			if($('tr').length==5){$("#agregar").attr('disabled', 'disabled');}
		    
		}
       
        
     }						);
			var editor = new TINY.editor.edit('editor', {
			id: 'tinyeditor',
			width: 584,
			height: 175,
			cssclass: 'tinyeditor',
			controlclass: 'tinyeditor-control',
			rowclass: 'tinyeditor-header',
			dividerclass: 'tinyeditor-divider',
			controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
				'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
				'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
				'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'print'],
			footer: true,
			fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
			xhtml: true,
			cssfile: 'custom.css',
			bodyid: 'editor',
			footerclass: 'tinyeditor-footer',
			toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
			resize: {cssclass: 'resize'}
														}
											);
      $('#registro').submit(function()
	    {      		
				$('.prod_list').each(function(index)    
				{
				$('#temp'+index+'').val($(this).data('temporal'));
				}
									);
						
					
		}					); 	
							}
								
	
      
								
								
				);
				
				
function validacion() {
	
	editor.post();
	var x=document.forms["myForm"]["receta"].value;
	var y=document.forms["myForm"]["detalles"].value;
	
	if (x==null || x=="")
	{alert("Ingrese un nombre de receta");
	return false;
	}
  
  else if($("tr").length==1)
  {alert("Seleccione algun producto");
   return false;
  }
  
  else if(y==null || y=="")
  {alert("Ingrese alguna descripcion");
  return false;
  }
  alert("Receta guardada exitosamente");
						}