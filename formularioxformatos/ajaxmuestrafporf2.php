<?php
require_once("../sec.php");
extract ($_POST, EXTR_PREFIX_ALL, "pst");
$cadenas="SELECT nombrecampo,tipo,valores FROM formatocampos WHERE idformato='$pst_vajax'";
$qcadenas=mysql_query($cadenas)or die(mysql_error());
$total=array();
while($fetch=mysql_fetch_row($qcadenas))
{
if($fetch[1]=='t')
{/*
$separar='<div><input type="text" name="'.$fetch[0].'" ></input></div>';//-->name el mismo nombre del titulo
$separar='<div class="titcamp">'.$fetch[0].'</div>'.$separar;
array_push($total, $separar);*/
$separar='<div><input type="text" name="'.$fetch[0].'" ></input></div>';//-->name el mismo nombre del titulo
$separar='<legend class="titcamp">'.$fetch[0].'</legend>'.$separar;
$separar='<fieldset>'.$separar.'</fieldset>';
array_push($total, $separar);
}
if($fetch[1]=='n'){
/*
$separar='<div><input type="text" name="'.$fetch[0].'" ></input></div>';
$separar='<div class="titcamp">'.$fetch[0].'</div>'.$separar;
array_push($total, $separar);*/
$separar='<div><input type="text" name="'.$fetch[0].'" ></input></div>';
$separar='<legend class="titcamp">'.$fetch[0].'</legend>'.$separar;
$separar='<fieldset>'.$separar.'</fieldset>';

array_push($total, $separar);

}
if($fetch[1]=='r'){
$separar="";
$temp=explode(",", $fetch[2]);
for($i=0;$i<sizeof($temp);$i++)
{$separar .='<input type="radio" name="'.$fetch[0].'" value="'.$temp[$i].'">'.$temp[$i].'<br>';


}/*
$separar='<div>'.$separar.'</div>';
$separar='<div class="titcamp">'.$fetch[0].'</div>'.$separar;
	array_push($total, $separar);  */
	$separar='<div>'.$separar.'</div>';
$separar='<legend class="titcamp">'.$fetch[0].'</legend>'.$separar;
$separar='<fieldset>'.$separar.'</fieldset>';
	array_push($total, $separar); 

}

if($fetch[1]=='s')
{
$separar="";
$temp=explode(",", $fetch[2]);
for($i=0;$i<sizeof($temp);$i++)
{$separar .='<option value="'.$i.'">'.$temp[$i].'</option>';
}
/*
$separar='<div><select name="'.$fetch[0].'">'.$separar.'</select></div>';
$separar='<div class="titcamp">'.$fetch[0].'</div>'.$separar;
	array_push($total, $separar);*/
	$separar='<div><select name="'.$fetch[0].'">'.$separar.'</select></div>';
$separar='<legend class="titcamp">'.$fetch[0].'</legend>'.$separar;
$separar='<fieldset>'.$separar.'</fieldset>';
	array_push($total, $separar);
}

if($fetch[1]=='c'){


$separar="";
$temp=explode(",", $fetch[2]);
for($i=0;$i<sizeof($temp);$i++)
{$separar .='<input type="checkbox" name="'.$temp[$i].'">'.$temp[$i].'<br>';
}/*
$separar='<div>'.$separar.'</div>';
$separar='<div class="titcamp">'.$fetch[0].'</div>'.$separar;
	array_push($total, $separar);*/

	$separar='<div>'.$separar.'</div>';
$separar='<legend class="titcamp">'.$fetch[0].'</legend>'.$separar;
$separar='<fieldset>'.$separar.'</fieldset>';
	array_push($total, $separar);
}

}
//print_r($total);
echo json_encode($total);


?>