<?php
require_once("../sec.php");
extract ($_POST, EXTR_PREFIX_ALL, "pst");

$campos="SELECT tipo,nombrecampo,valores FROM formatocampos WHERE idformato='$pst_vajax'";
$qcampos=mysql_query($campos)or die(mysql_error());
$total=array();
$i=0;
$desca='';
$tipoa='';
$vala='';

while($fetch=mysql_fetch_row($qcampos))
{
$desca[$i]='<td><input class="descripcion" name="desc[]" type="text" size="18" placeholder="Ingrese descripcion" value="'.$fetch[1].'" required /></td>';
if($fetch[0]=='t')
{$tipoa[$i]='<td><select class="tipo" name="tipo[]" ><option value="t" selected>texto</option><option value="n">numerico</option><option value="r">radiobuttom</option><option value="s">select</option><option value="c">checkbox</option></select></td>';}
if($fetch[0]=='n')
{$tipoa[$i]='<td><select class="tipo" name="tipo[]" ><option value="t">texto</option><option value="n" selected>numerico</option><option value="r">radiobuttom</option><option value="s">select</option><option value="c">checkbox</option></select></td>';}
if($fetch[0]=='r')
{$tipoa[$i]='<td><select class="tipo" name="tipo[]" ><option value="t">texto</option><option value="n">numerico</option><option value="r" selected>radiobuttom</option><option value="s">select</option><option value="c">checkbox</option></select></td>';}
if($fetch[0]=='s')
{$tipoa[$i]='<td><select class="tipo" name="tipo[]" ><option value="t">texto</option><option value="n">numerico</option><option value="r">radiobuttom</option><option value="s" selected>select</option><option value="c">checkbox</option></select></td>';}
if($fetch[0]=='c')
{$tipoa[$i]='<td><select class="tipo" name="tipo[]" ><option value="t">texto</option><option value="n">numerico</option><option value="r">radiobuttom</option><option value="s">select</option><option value="c" selected>checkbox</option></select></td>';}

$vala[$i]='<td><input class="valores" name="val[]" type="text" size="40" placeholder="Valores" value="'.$fetch[2].'"/></td>';

$i++;
}
array_push($total, $desca);
array_push($total, $tipoa);
array_push($total, $vala);
if(empty($total[0])&&empty($total[1])&&empty($total[2])){$total[0]=1;$total[1]=1;$total[2]=1;}
//print_r($total);
echo json_encode($total);
?>