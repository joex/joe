<?php
require_once("../sec.php");
extract ($_POST, EXTR_PREFIX_ALL, "pst");
//$query="UPDATE evaluaciones set estado='$pst_value' where nombre='$pst_nombre' ";
$query="UPDATE evaluaciones set estado='0' where nombre='$pst_nombre' ";
$pquery=mysql_query($query);
$sql="SELECT nombre, tema from evaluaciones where estado='1' ";
$psql=mysql_query($sql)or die(mysql_error());
$name="";


while($fetch=mysql_fetch_assoc($psql))
{$name.='<tr><td>'.$fetch["nombre"].'</td><td>'.$fetch["tema"].'</td><td><input type="button" class="editar" value="EDITAR"><input type="button" class="desactivar" value="DESACTIVAR"></td></tr>';
}
echo $name;

?>