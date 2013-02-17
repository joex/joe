<?php
require_once("../sec.php");
extract ($_POST, EXTR_PREFIX_ALL, "pst");
/*

echo 'total de agrupaciones'.sizeof($pst_agrupando).'<br>';

echo 'id evaluacion'.$pst_idevalu.'<br>';


echo 'opcion:'.$pst_respuesta[1].'<br>';

print_r($pst_agrupando); 

echo 'agrupandoooooooooooo:'.$pst_agrupando[0].'<br>';


$w='0';

for($i=0;$i<sizeof($pst_agrupando);$i++)
{


echo "pregunta:".$pst_preg[$i];


	for($j=0;$j<$pst_agrupando[$i];$j++)
	{echo 'entra';
	echo "respuesta".$pst_respuesta[$w]."<br>";
	
	echo "puntaje".$pst_puntaje[$w]."<br>";

	$w++;
	}


}
*/




$elimeval="DELETE FROM evaluaciones WHERE ideval='$pst_idevalu'";
mysql_query($elimeval)or die(mysql_error());
$elimpreg="SELECT idpreg FROM preguntas  WHERE ideval='$pst_idevalu'";
$qelimpreg=mysql_query($elimpreg)or die(mysql_error());

while($fetch=mysql_fetch_row($qelimpreg))
{
$elimop="DELETE FROM opciones WHERE idpreg='$fetch[0]'";
mysql_query($elimop)or die(mysql_error());
}

$elipreg="DELETE FROM preguntas WHERE ideval='$pst_idevalu'";
mysql_query($elipreg)or die(mysql_error());



$inserteval="INSERT INTO evaluaciones (nombre,tema,estado,horacreacion,logincreacion) VALUES ('$pst_nombre','$pst_tema','1',now(),'joujou')";
mysql_query($inserteval)or die(mysql_error());
$recpidval=mysql_insert_id($conexion);

echo $recpidval;

$w='0';

for($i=0;$i<sizeof($pst_agrupando);$i++)
{
$insertpreg="INSERT INTO preguntas (ideval,hora,estado,tipo,pregunta,logincrea,numop) VALUES('$recpidval',now(),'1','$pst_tipo[$i]','$pst_preg[$i]','joujou','$pst_agrupando[$i]')";
mysql_query($insertpreg)or die(mysql_error());
$recpidpreg=mysql_insert_id($conexion);

	for($j=0;$j<$pst_agrupando[$i];$j++)
	{
	$insertopciones="INSERT INTO opciones (idpreg,respuesta,puntaje) VALUES ('$recpidpreg','$pst_respuesta[$w]','$pst_puntaje[$w]')";
	mysql_query($insertopciones)or die(mysql_error());
	$w++;
	}


}
header('Location: rel_cuestionarios.php');



?>
