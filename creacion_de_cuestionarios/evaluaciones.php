<?php
require_once("../sec.php");
extract ($_POST, EXTR_PREFIX_ALL, "pst");
if(!empty($pst_preg)|| !empty($pst_tipo)|| !empty($pst_nombre)|| !empty($pst_tema)|| !empty($pst_respuesta)|| !empty($pst_puntaje))
{

$inserteval="INSERT INTO evaluaciones (nombre,tema,estado,horacreacion,logincreacion) VALUES ('$pst_nombre','$pst_tema','1',now(),'joujou')";
mysql_query($inserteval)or die(mysql_error());
$recpidval=mysql_insert_id($conexion);


$i=0;
foreach ($pst_preg as $rot)
{$insertpreg="INSERT INTO preguntas (ideval,hora,estado,tipo,pregunta,logincrea) VALUES('$recpidval',now(),'1','$pst_tipo[$i]','$rot','joujou')";
mysql_query($insertpreg)or die(mysql_error());
$recpidpreg=mysql_insert_id($conexion);
echo $recpidpreg;
$j=0;
	foreach($pst_respuesta as $rot1)
	{	$insertopciones="INSERT INTO opciones (idpreg,respuesta,puntaje) VALUES ('$recpidpreg','$pst_respuesta[$j]','$pst_puntaje[$j]')";
	mysql_query($insertopciones)or die(mysql_error());
	$j++;	
	}	
		
$i++;

}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Registra formularios por formato</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../stylesheets/evaluaciones.css" media="all"/>
<script type="text/javascript" src="../javascript/evaluaciones.js"></script>	
</head>

<body>
<div id="titrerf">Creacion de cuestionarios</div><br>
<form id="f" name="f" action="evaluaciones.php"  method="post">

Nombre<input type="text" id="nombre" name="nombre" placeholder="Ingrese nombre" />
Tema<input type="text" id="tema" name="tema" placeholder="Ingrese un tema"/>

<br><br>
      <table id="campos" >
      <tr>
      <th width="350px">Pregunta <input type="button" id="newp"  value="+" /></th>
      <th width="110px">Tipo</th>
      <th width="350px">Opciones</th>
      <th width="75">Eliminar</th>
      </tr>
      </table>
<div id="botones">
<input type="submit" id="guardar" value="Guardar Todos" />

</div>
</form>

</body>

</html>