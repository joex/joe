<?php
$host= "localhost";
$user="root";
$pass="root";
$db="joe";
$conexion = mysql_connect($host, $user, $pass);
mysql_select_db($db,$conexion);
?>