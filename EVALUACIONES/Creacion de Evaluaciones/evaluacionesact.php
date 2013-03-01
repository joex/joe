<?php
require_once("../../sec.php");
extract ($_POST, EXTR_PREFIX_ALL, "pst");
//if(!empty($pst_preg))
//{

$idevaluacion=$_GET['actuaideval'];
$trozo="";
$seleval="SELECT nombre,tema from evaluaciones WHERE ideval='$idevaluacion'";
$qseleval=mysql_query($seleval)or die(mysql_error());
while($fetch=mysql_fetch_row($qseleval))
{
$joujou="Nombre<input type='text' id='nombre' name='nombre' placeholder='Ingrese nombre' value='$fetch[0]'>
Tema<input type='text' id='tema' name='tema' placeholder='Ingrese un tema' value='$fetch[1]'>
<input type='hidden' name='idevalu' value='$idevaluacion'>";
}
//}

$selpreg="SELECT ideval,tipo,pregunta,idpreg,numop from preguntas WHERE ideval='$idevaluacion' ORDER BY idpreg ";
$qselpreg=mysql_query($selpreg)or die(mysql_error());
while($fetch=mysql_fetch_row($qselpreg))
{	$idpreg=$fetch[3];
	$pregunta=$fetch[2];
	$tipo=$fetch[1];
	$conta=$fetch[4];
	
	

	$selopcion="SELECT respuesta,puntaje from opciones WHERE idpreg='$idpreg' ORDER BY idopcion";
	$qselopcion=mysql_query($selopcion)or die(mysql_error());
	$acumula='';
	while($fetch=mysql_fetch_row($qselopcion))
	{
	$acumula .="<table><tr>
	<td><input type='text' class='opcion' name='respuesta[]' value='$fetch[0]'></td>
	<td><input type='text' class='puntaje' name='puntaje[]' value='$fetch[1]'></td>
	<td><input type='button' class='btneliminar' onclick='eliminar2(this)' value='Eliminar'></td>
	</tr></table>";
	}
	
	
	
	if($tipo=='r')
	{
	$trozo .="
		 
		  <tr class='bye'>
		  <td><textarea required='' placeholder='Ingrese una pregunta' cols='40' rows='4' name='preg[]' class='pregunta' >$pregunta</textarea></td>
		  <td><select name='tipo[]' class='tipo'><option value='r' selected>radiobuttom</option><option value='c'>checkbox</option></select></td>
		  <td>OPCIONES<input type='hidden' name='agrupando[]' value='$conta'> <input type='button' class='btnaumentar' onclick='nuevaopcion(this)' value='+'>".$acumula."</td>
		  <td><input type='button' class='btneliminar' onclick='eliminar(this)' value='Eliminar'></td></tr>";
		  }
		  
		  if($tipo=='c')
	{
	$trozo .="
		 
		  <tr class='bye'>
		  <td><textarea required='' placeholder='Ingrese una pregunta' cols='40' rows='4' name='preg[]' class='pregunta' >$pregunta</textarea></td>
		  <td><select name='tipo[]' class='tipo'><option value='r'>radiobuttom</option><option value='c' selected>checkbox</option></select></td>
		  <td>OPCIONES<input type='hidden' name='agrupando[]' value='$conta'> <input type='button' class='btnaumentar' onclick='nuevaopcion(this)' value='+'>".$acumula."</td>
		  <td><input type='button' class='btneliminar' onclick='eliminar(this)' value='Eliminar'></td></tr>";
		  }
		  
	  
	  
	  
	  
	  
}


?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Registra formularios por formato</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../stylesheets/registrafporf.css" media="all"/>
<script type="text/javascript" src="../../javascript/evaluacionesact.js"></script>	
</head>

<body>
<div id="titrerf">Creacion de cuestionarios</div><br>
<form id="f" name="f" action="g_evaluacionesact.php"  method="post">

<!--Nombre<input type="text" id="nombre" name="nombre" placeholder="Ingrese nombre" />
Tema<input type="text" id="tema" name="tema" placeholder="Ingrese un tema"/>  -->
<?php echo $joujou;?>
<br><br>
      <table id="campos" >
      <tr>
      <th width="150px">Pregunta <input type="button" id="newp"  value="+" /></th>
      <th width="110px">Tipo</th>
      <th width="280px">Opciones</th>
      <th width="75">Eliminar</th>
      </tr>
	  <?php echo $trozo;?>
      </table>
<div id="botones">
<input type="submit" id="guardar" value="Guardar Todos" />


</div>
</form>

</body>

</html>