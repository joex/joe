<?php
require_once("../../sec.php");
if(isset($_GET["iniciar_eval"])){
$id=$_GET["iniciar_eval"];
$sqlt="INSERT INTO resultados (ideval, login, hora) values ('$id', 'USUARIO', NOW())";
$p_sqlt=mysql_query($sqlt);
$total=array();
$total_opciones=array();
$total_preguntas=array();
$sql1="SELECT nombre, tema from evaluaciones where ideval='$id' ";
$res1=mysql_query($sql1);
$nombre="";
while($data1=mysql_fetch_row($res1)){$nombre=$data1[0].' : '.$data1[1] ;}
$sql2="SELECT idpreg, pregunta, tipo from preguntas where ideval='$id' ORDER BY idpreg ";
$res2=mysql_query($sql2);
$c=mysql_num_rows($res2);
$preguntas="";
while($data2=mysql_fetch_row($res2)){
$preguntas='<legend class="texto">'.$data2[1].'</legend>';
$sql3="SELECT idopcion, respuesta from opciones where idpreg='$data2[0]' order by idopcion";
$res3=mysql_query($sql3);
$opciones="";
     
	if($data2[2]=='r'){
	
	while($data3=mysql_fetch_row($res3)){
    $opciones .='<input type="radio"  name="'.$data2[0].'" value="'.$data3[0].'" class="'.'class'.$data2[2].'"><label class="lab">'.$data3[1].'</label></br>';
    }
	$opciones='<div>'.$opciones.'</div>';
    }
	
	else {
	
	while($data3=mysql_fetch_row($res3)){
    $opciones .='<input type="checkbox"  name="'.$data2[0].'" value="'.$data3[0].'" class="'.'class'.$data2[2].'"><label class="lab">'.$data3[1].'</label></br>';
    }
	$opciones='<div>'.$opciones.'</div>';
    }
	

array_push($total_opciones, $opciones);  
array_push($total_preguntas, $preguntas);  
}
array_push($total, $total_preguntas);
array_push($total, $total_opciones);
}
echo '<input type="hidden"  id="id_eval" value="'.$_GET["iniciar_eval"].'">'
?>
<html>
<head>
<title><?php echo $nombre ;?></title>
<link rel="stylesheet" type="text/css" href="../../stylesheets/rel_cuestionarios.css" media="all"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="../../javascript/cuestionario.js" ></script>
</head>
<body>
<div id="titulo"><?php echo $nombre ;?></div></br>
<form>
<?php for($i=0;$i<$c;$i++) {?>
<fieldset class="campo"><?php echo $total[0][$i] ?>
<?php echo $total[1][$i] ?></fieldset></br>
<?php } ?>
<input type="button" id="rec" value="GRABAR">
</form>
</body>
</html>