
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Registra formularios por formato</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../stylesheets/registrafporf.css" media="all"/>
<script type="text/javascript" src="../../javascript/evaluaciones.js"></script>	
</head>

<body>
<div id="titrerf">Creacion de cuestionarios</div><br>
<form id="f" name="f" action="g_evaluaciones.php"  method="post">

Nombre<input type="text" id="nombre" name="nombre" placeholder="Ingrese nombre" />
Tema<input type="text" id="tema" name="tema" placeholder="Ingrese un tema"/>

<br><br>
      <table id="campos" >
	
      <tr>
      <th width="150px">Pregunta <input type="button" id="newp"  value="+" /></th>
      <th width="110px">Tipo</th>
      <th width="280px">Opciones</th>
      <th width="75">Eliminar</th>
      </tr>
	  
      </table>
<div id="botones">
<input type="submit" id="guardar" value="Guardar Todos" />

</div>
</form>

</body>

</html>