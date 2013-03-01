<?php
require_once("../../sec.php");
extract ($_POST, EXTR_PREFIX_ALL, "pst");
$inserteval="INSERT INTO evaluaciones (nombre,tema,estado,horacreacion,logincreacion) VALUES ('$pst_nombre','$pst_tema','1',now(),'joujou')";
mysql_query($inserteval)or die(mysql_error());
$recpidval=mysql_insert_id($conexion);

echo $recpidval;

$w='0';

for($i=0;$i<sizeof($pst_agrupando);$i++)
{



//$insertpreg="INSERT INTO preguntas (ideval,hora,estado,tipo,pregunta,logincrea) VALUES('$recpidval',now(),'1','$pst_tipo[$i]','$pst_preg[$i]','joujou')";
//mysql_query($insertpreg)or die(mysql_error());
$insertpreg="INSERT INTO preguntas (ideval,hora,estado,tipo,pregunta,logincrea,numop) VALUES('$recpidval',now(),'1','$pst_tipo[$i]','$pst_preg[$i]','joujou','$pst_agrupando[$i]')";
mysql_query($insertpreg)or die(mysql_error());

$recpidpreg=mysql_insert_id($conexion);

	for($j=0;$j<$pst_agrupando[$i];$j++)
	{
	$insertopciones="INSERT INTO opciones (idpreg,respuesta,puntaje) VALUES ('$recpidpreg','$pst_respuesta[$w]','$pst_puntaje[$w]')";
	mysql_query($insertopciones)or die(mysql_error());
	$w++;
	}
//guardando numero de opciones por pregunta
//$numop="INSERT INTO preguntas (numop) VALUES ('$pst_agrupando[$i]') WHERE idpreg='$recpidpreg'";
//mysql_query($numop)or die(mysql_error());


}
header('Location: ../creareval.php');


?>
