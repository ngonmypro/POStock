<?php session_start();
include '../js/conn.php';

$sql = 'DELETE FROM list_tb WHERE List_PoID = "'.$_POST['id'].'" ';
$rs = mysql_query($sql) or die(mysql_error());

$sql2 = 'DELETE FROM po_tb WHERE PoID = "'.$_POST['id'].'" ';
$rs2 = mysql_query($sql2) or die(mysql_error());

echo "Y";
?>