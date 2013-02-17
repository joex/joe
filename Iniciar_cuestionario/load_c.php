<html>
<head>
<title>RELACION DE CUESTIONARIOS</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../stylesheets/rel_cuestionarios.css" media="all"/>

</head>

<table id="table" >
<thead>
<th>NOMBRE</th>
<th>TEMA</th>
<th>ACCIONES</th>

</thead>
<tbody>
<form action="cuestionario.php" method="get">
<?php
require_once("../sec.php");
$sql="SELECT ideval, nombre, tema from evaluaciones where estado='1' ";
$psql=mysql_query($sql)or die(mysql_error());
$importar="";
$tema="";
while($fetch=mysql_fetch_assoc($psql))
{$importar.='<tr><td>'.$fetch["nombre"].'</td><td>'.$fetch["tema"].'</td><td><button name="iniciar_eval" type="submit"  class="iniciar" value="'.$fetch["ideval"].'">INICIAR EVALUACION</button></td></tr>';
}
echo $importar;
?>
</form>
</tbody>
</table>

<body>
</body>
</html>