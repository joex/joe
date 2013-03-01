<?php
require_once("sec.php");
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
$sql2="SELECT a.ideval as ID_EVALUACION ,b.idres as NUMERO,sum(a.puntaje) as PUNTAJE, b.login as LOGIN, b.hora as HORA  from (SELECT evaluaciones.ideval, preguntas.idpreg, opciones.idopcion, opciones.puntaje from evaluaciones INNER JOIN preguntas ON evaluaciones.ideval=preguntas.ideval INNER JOIN opciones ON preguntas.idpreg=opciones.idpreg where opciones.puntaje!='0' order by idopcion)a JOIN (SELECT idres, idpreg, idopcion, login, hora from resultados2 where idres='$a[$i]')b ON b.idpreg=a.idpreg and b.idopcion=a.idopcion ";
$p_sql2=mysql_query($sql2);
$fetch2=mysql_fetch_assoc($p_sql2);
$b.='<tr><td>'.$fetch2["ID_EVALUACION"].'</td><td>'.$fetch2["NUMERO"].'</td><td>'.$fetch2["PUNTAJE"].'</td><td>'.$fetch2["LOGIN"].'</td><td>'.$fetch2["HORA"].'</td></tr>';
}
//print_r($b);
?>
<html>
<head>
<title>RESULTADO DE LAS EVALUACIONES </title>
<link rel="stylesheet" type="text/css" href="rel_cuestionarios.css" media="all"/>
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
<th>HORA</th>
</tr>
</thead>
<tbody>
<?php echo $b;?>
</tbody>
</table>
</body>
</html>