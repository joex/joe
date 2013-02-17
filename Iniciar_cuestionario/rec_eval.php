<?php
require_once("../sec.php");
extract ($_POST, EXTR_PREFIX_ALL, "pst");
$n=sizeof($pst_datos);
$count=$n/2;
$sql1="INSERT INTO resultados (ideval,login) values ('$pst_id','joujou')";
$p_sql1=mysql_query($sql1);
$temp=mysql_insert_id($conexion);
echo $temp;
for($i=0;$i<$count;$i++)
{
$m=$i+$i;
$n=$m+1;
$sql2="INSERT INTO resultados2 (idres, idopcion, idpreg,login) values ('$temp', '$pst_datos[$m]', '$pst_datos[$n]','joujou')";
$p_sql2=mysql_query($sql2);
}
//print_r($data)



?>