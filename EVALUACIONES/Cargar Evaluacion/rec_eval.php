<?php
require_once("../../sec.php");
extract ($_POST, EXTR_PREFIX_ALL, "pst");
$n=sizeof($pst_datos);
$count=$n/2;
$sql1="SELECT max(idres) as id from resultados";
$p_sql1=mysql_query($sql1);
while($list=mysql_fetch_assoc($p_sql1)){
$temp=$list["id"];
}
//echo $temp;
for($i=0;$i<$count;$i++)
{
$m=$i+$i;
$n=$m+1;
$sql2="INSERT INTO resultados2 (ideval, idres, idopcion, idpreg, login, hora ) values ('$pst_id', '$temp', '$pst_datos[$m]', '$pst_datos[$n]', 'USUARIO', NOW())";
$p_sql2=mysql_query($sql2);
}
$nota="";
$notat="";
$squery="SELECT coalesce(sum(a.puntaje),0) as puntaje from (SELECT preguntas.idpreg, opciones.idopcion, opciones.puntaje from evaluaciones 
INNER JOIN preguntas ON evaluaciones.ideval=preguntas.ideval INNER JOIN opciones ON preguntas.idpreg=opciones.idpreg 
where opciones.puntaje!='0' order by idopcion)a JOIN (SELECT idpreg, idopcion from resultados2 where idres='$temp')b 
ON b.idpreg=a.idpreg and b.idopcion=a.idopcion ";
$p_squery=mysql_query($squery);
while($fetch=mysql_fetch_assoc($p_squery)){

$nota.="PUNTAJE OBTENIDO : ".$fetch["puntaje"];
}
$squery2="SELECT sum(a.puntaje) as total from (SELECT evaluaciones.ideval , preguntas.idpreg, opciones.idopcion, opciones.puntaje from evaluaciones INNER JOIN preguntas ON evaluaciones.ideval=preguntas.ideval INNER JOIN opciones ON preguntas.idpreg=opciones.idpreg where opciones.puntaje!='0' and evaluaciones.ideval='$pst_id' order by idopcion)a";
$p_squery2=mysql_query($squery2);
while($fetch2=mysql_fetch_assoc($p_squery2)){
$notat.=" DE ".$fetch2["total"];
}
echo $nota.$notat;
?>