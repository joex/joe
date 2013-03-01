<?php
require_once("sec.php");
extract ($_POST, EXTR_PREFIX_ALL, "pst");
$n=sizeof($pst_datos);
$count=$n/2;
$sql1="INSERT INTO resultados (ideval) values ('$pst_id')";
$p_sql1=mysql_query($sql1);
$temp=mysql_insert_id($conexion);
//echo $temp;
for($i=0;$i<$count;$i++)
{
$m=$i+$i;
$n=$m+1;
$sql2="INSERT INTO resultados2 (idres, idopcion, idpreg) values ('$temp', '$pst_datos[$m]', '$pst_datos[$n]')";
$p_sql2=mysql_query($sql2);
}
//print_r($data)
/*$vec1="";
$vec2="";
$sql3="SELECT idpreg from preguntas where ideval='$pst_id' ORDER BY idpreg";
$p_sql3=mysql_query($sql3);
$count=mysql_num_rows($p_sql3);
//CONTADOR TOTAL//
$c="";
$cn="";
$query="SELECT idpreg, tipo from preguntas where ideval='$pst_id' ORDER BY idpreg";
$pquery=mysql_query($query);
for($i=0;$i<$count;$i++){
$data_c=mysql_fetch_row($pquery);
$c[$i]=$data_c[0];
}
for($i=0;$i<$count;$i++){
$sqlc="SELECT idopcion from opciones where idpreg='$c[$i]' and puntaje!='0'";
$p_sqlc=mysql_query($sqlc);
$data_n=mysql_fetch_row($p_sqlc);
$cn[$i]=$data_n[0];
}
$count2=sizeof($cn);
///////////////////
//RESPUESTAS CORRECTAS//
for($i=0;$i<$count2;$i++){
$data1=mysql_fetch_assoc($p_sql3);
$vec1[$i]=$data1["idpreg"];
$sql4="SELECT idopcion from opciones where idpreg='$vec1[$i]' and puntaje!='0' ";
$p_sql4=mysql_query($sql4);
$data=mysql_fetch_assoc($p_sql4);
$vec2[$vec1[$i]]=$data["idopcion"];
 }
///////////////////////
//RESPUESTAS MARCADAS//
$vec5="";
$sql5="SELECT idpreg, idopcion from resultados2 where idres='$temp'";
$p_sql5=mysql_query($sql5);
while($data5=mysql_fetch_assoc($p_sql5)){
$vec5[$data5["idpreg"]]=$data5["idopcion"];
} 
//echo $pst_id;
///////////////////////
$score=0;
$total=0;
$sql6="SELECT idpreg from preguntas where ideval='$pst_id' ORDER BY idpreg";
$p_sql6=mysql_query($sql6);
$vecp="";
for($i=0;$i<$count2;$i++){
$vec1[$i]=mysql_result($p_sql3,$i,'idpreg');
$sql7="SELECT idopcion, puntaje from opciones where idpreg='$vec1[$i]' and puntaje!='0' ";
$p_sql7=mysql_query($sql7);
$datap=mysql_fetch_assoc($p_sql7);
$vecp[$datap["idopcion"]]=$datap["puntaje"];
if($vec2[$vec1[$i]]==$vec5[$vec1[$i]]){
$score=$score+$vecp[$datap["idopcion"]];
}
else{
$score=$score+0;
}
$total+=$vecp[$datap["idopcion"]];
}
print_r($vec2);
print_r($vec5);
print_r($vecp);*/
//echo "PUNTAJE TOTAL : ".$score." de ".$total ;
//echo "CONTADOR PARCIAL: ".$count;
//echo "CONTADOR TOTAL: ".$count2;
$nota="";
$notat="";
$squery="SELECT sum(a.puntaje) as puntaje from (SELECT preguntas.idpreg, opciones.idopcion, opciones.puntaje from evaluaciones INNER JOIN preguntas ON evaluaciones.ideval=preguntas.ideval INNER JOIN opciones ON preguntas.idpreg=opciones.idpreg where opciones.puntaje!='0' order by idopcion)a JOIN (SELECT idpreg, idopcion from resultados2 where idres='$temp')b ON b.idpreg=a.idpreg and b.idopcion=a.idopcion ";
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