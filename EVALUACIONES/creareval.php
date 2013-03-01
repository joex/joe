<?php
require_once("../sec.php");
$sql="SELECT nombre,tema,ideval,estado from evaluaciones ";
$psql=mysql_query($sql)or die(mysql_error());
$importar="";
$tema="";
while($fetch=mysql_fetch_assoc($psql)){
//$name.='<tr><td>'.$fetch["nombre"].'</td><td>'.$fetch["tema"].'</td><td><input type="button" class="editar" value="EDITAR"><input type="button" class="desactivar" value="DESACTIVAR"></td></tr>';
 if($fetch["estado"]==1){
 $importar.='<tr class="'.'clase'.$fetch["estado"].'"><td class="'.'clase'.$fetch["estado"].'">'.$fetch["nombre"].'</td><td class="'.'clase'.$fetch["estado"].'">'.$fetch["tema"].'</td><td class="'.'clase'.$fetch["estado"].'"><input type="button" class="editar" value="EDITAR"><input type="button" class="desactivar" value="DESACTIVAR"><input type="hidden" name="oc[]" value="'.$fetch["ideval"].'"></td></tr>';
 }
 else if($fetch["estado"]==0){
 $importar.='<tr class="'.'clase'.$fetch["estado"].'"><td class="'.'clase'.$fetch["estado"].'">'.$fetch["nombre"].'</td><td class="'.'clase'.$fetch["estado"].'">'.$fetch["tema"].'</td><td class="'.'clase'.$fetch["estado"].'"><input type="button" class="activar" value="ACTIVAR"><input type="hidden" name="oc[]" value="'.$fetch["ideval"].'"></td></tr>';
 }
 } 

?>
<html>
<head>
<title>RELACION DE CUESTIONARIOS</title>
<link rel="stylesheet" type="text/css" href="../stylesheets/rel_cuestionarios.css" media="all"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="../javascript/rel_cuestionarios.js" ></script>
</head>
<div id="titrerf">RELACION DE CUESTIONARIOS</div><br>
<table id="table">
<thead>
<tr>
<th>NOMBRE</th>
<th>TEMA</th>
<th>ACCIONES</th>
<th><input type="button" id="nuevo" value="NUEVO"></th>
</tr>
</thead>
<tbody id="tab">
<?php echo $importar;?>
</tbody>
</table>
<body>
</body>
</html>