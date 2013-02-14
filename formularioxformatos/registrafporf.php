<?php
require_once("../sec.php");
extract ($_POST, EXTR_PREFIX_ALL, "pst");
if(!empty($pst_desc)|| !empty($pst_tipo)||!empty($pst_val))
{$elimina="DELETE FROM formatocampos WHERE idformato='$pst_format'";
mysql_query($elimina)or die(mysql_error());
for($i=0;$i<sizeof($pst_desc);$i++){
$j=$i+1;
$guarda="INSERT INTO formatocampos VALUES('$pst_format','$pst_tipo[$i]','$j','$pst_desc[$i]','$pst_val[$i]')";
mysql_query($guarda)or die(mysql_error());
}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Registra formularios por formato</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../stylesheets/registrafporf.css" media="all"/>
<script type="text/javascript" src="../javascript/registrafporf.js"></script>	
</head>

<body>
<div id="titrerf">Registra formularios por formato</div><br>
<form id="f" name="f" action="registrafporf.php"  method="post">
<select id ="selec" name="format">
</select>
<input type="button" id="cambioform" value="Cambiar formato" /><br><br>
      <table id="campos" >
      <tr>
      <th width="150px">Descripcion</th>
      <th width="110px">Tipo</th>
      <th width="280px">Valores</th>
      <th width="75">Eliminar</th>
      </tr>
      </table>
<div id="botones">
<input type="submit" id="guardar" value="Guardar Todos" />
<input type="button" id="newp"  value="A&ntilde;adir producto" />
</div>
</form>

</body>

</html>
