<?php
require_once("../sec.php");
extract ($_POST, EXTR_PREFIX_ALL, "pst");



ini_set('max_execution_time', 300);
/*
$actuadatos="update operaciones set intervalo= case 
when minute(hora) between '0' and '4' then '0'
when minute(hora) between '5' and '9' then '1'
when minute(hora) between '10' and '14' then '2'
when minute(hora) between '15' and '19' then '3'
when minute(hora) between '20' and '24' then '4'
when minute(hora) between '25' and '29' then '5'
when minute(hora) between '30' and '34' then '6'
when minute(hora) between '35' and '39' then '7'
when minute(hora) between '40' and '44' then '8'
when minute(hora) between '45' and '49' then '9'
when minute(hora) between '50' and '54' then '10'
when minute(hora) between '55' and '59' then '11'
end
";

$qactuadatos=mysql_query(actuadatos)or die(mysql_error());
*/

$datos="SELECT DATE_FORMAT(hora, '%H %i %D %M %Y') AS month, COUNT(*) AS cantidad,intervalo,YEAR(hora),MONTH(hora),DAY(hora),HOUR(hora) FROM operaciones WHERE YEAR(hora)='2011' AND estado='$pst_esta' GROUP BY YEAR(hora), MONTH(hora),DAY(hora),HOUR(hora),intervalo 
  ";
 
 //0-->fecha
 //1-->cantidad
 //2-->intervalo
 //3-->ano
 //4-->mes
 //5-->dia
 //6-->hora

 $qdatos=mysql_query($datos)or die(mysql_error());
 

$joe="";
while($fetch=mysql_fetch_row($qdatos))
{
 $temp=$fetch[2]*5;
  $temp2=strtotime("$fetch[3]-$fetch[4]-$fetch[5] $fetch[6]:$temp -5 hours")*1000;

//$joe .="[ Date.UTC("."$fetch[3]".", "."$fetch[4]".","." $fetch[5]".","."$fetch[6]".","." $temp)".","."$fetch[1]"."  ], ";


//2012-05-11 09:14

$data[]=array(floatval($temp2),intval($fetch[1]));

//$data[] = array(strtotime("$fetch[3]-$fetch[4]-$fetch[5] $fetch[6]:$temp"),intval($fetch[1]));

//$data[] = array("$fetch[3]-$fetch[4]-$fetch[5] $fetch[6]:$temp",intval($fetch[1]));
} 


/*
$add="["."$joe"."]";
$add=[[1138838400000,72.10],
[1138924800000,71.85],
[1139184000000,67.30],
[1139270400000,67.60],
[1139356800000,68.81],
[1139443200000,64.95],
[1139529600000,67.31],
[1139788800000,64.71],
[1139875200000,67.64],
[1139961600000,69.22],
[1140048000000,70.57],
[1140134400000,70.29],
[1140480000000,69.08],
[1140566400000,71.32],
[1140652800000,71.75],
[1140739200000,71.46],
[1140998400000,70.99],
[1141084800000,68.49]
];
*/
//echo $add;
echo json_encode($data);





/*

$dia="SELECT id FROM grafbarras";
$qdia=mysql_query($dia)or die(mysql_error());
$seldia="";
$i=0;
while($fetch=mysql_fetch_row($qdia))
{$seldia[$i]="$fetch[0]";

$joroco[$i]=array("sel"=>"$seldia[$i]");
$i++;}  



echo json_encode($joroco);

*/
?>
