$(document).ready(iniciar);

function iniciar()
{$.post("ajaxregistrafporf.php",{},recibeform,"json");
$("#selecform").on("click",ajaxform);

}

function ajaxform()
{$("#formu").children().remove();
captura=$("#selec :selected").val();
$.post("ajaxmuestrafporf2.php",{vajax:captura},datosform,"json");
}


function datosform(data){
for(i=0;i<data.length;i++)
{$("#formu").append(data[i]);
}
}

function recibeform(data){
$("#selec").append(data);
}