<?php
require_once("../sec.php");
$sql1="SELECT idres from resultados";
$p_sql1=mysql_query($sql1);
$c=mysql_num_rows($p_sql1);
$a="";
$b="";
for($i=0;$i<$c;$i++){
$fetch=mysql_fetch_assoc($p_sql1);
$a[$i]=$fetch["idres"];
}
//print_r($a);
for($i=0;$i<$c;$i++){
$sql2="SELECT b.ideval as ID_EVALUACION ,b.idres as NUMERO,coalesce(sum(a.puntaje),0) as PUNTAJE, 
b.login as LOGIN, b.hora as HORA  from (SELECT evaluaciones.ideval, preguntas.idpreg, 
opciones.idopcion, opciones.puntaje from evaluaciones INNER JOIN preguntas ON 
evaluaciones.ideval=preguntas.ideval INNER JOIN opciones ON 
preguntas.idpreg=opciones.idpreg where opciones.puntaje!='0' order by 
idopcion)a RIGHT JOIN (SELECT ideval, idres, idpreg, idopcion, login, hora from 
resultados2 where idres='$a[$i]')b ON b.idpreg=a.idpreg and b.idopcion=a.idopcion ";
$p_sql2=mysql_query($sql2);
$fetch2=mysql_fetch_assoc($p_sql2);
$sql3="SELECT coalesce(hora,0) as inicio from resultados where idres='$a[$i]' ";
$p_sql3=mysql_query($sql3);
$fetch3=mysql_fetch_assoc($p_sql3);
$b.='<tr><td>'.$fetch2["ID_EVALUACION"].'</td><td>'.$fetch2["NUMERO"].'</td><td>'.$fetch2["PUNTAJE"].'</td><td>'.$fetch2["LOGIN"].'</td><td>'.$fetch3["inicio"].'</td><td>'.$fetch2["HORA"].'</td></tr>';
}
//print_r($b);
?>
<html>
<head>
<title>RESULTADO DE LAS EVALUACIONES </title>
<link rel="stylesheet" type="text/css" href="../stylesheets/rel_cuestionarios.css" media="all"/>
</head>
<body>
<div id="titulo">RESULTADO DE LAS EVALUACIONES</div>
<table class="table">
<thead>
<tr>
<th>ID EVALUACION</th>
<th>NUMERO</th>
<th>PUNTAJE</th>
<th>LOGIN</th>
<th>HORA INICIO</th>
<th>HORA FINAL</th>
</tr>
</thead>
<tbody>
<?php echo $b;?>
</tbody>
</table>
</body>
</html>