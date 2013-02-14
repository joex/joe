<?php
require_once("../sec.php");
extract ($_POST, EXTR_PREFIX_ALL, "pst");
$forma="SELECT idformato,nombre FROM formatos";
$qforma=mysql_query($forma)or die(mysql_error());
$selform=" ";
while($fetch=mysql_fetch_row($qforma))
{$selform .='<option value="'.$fetch[0].'">'.$fetch[1].'</option>';
}
echo json_encode($selform);
?>