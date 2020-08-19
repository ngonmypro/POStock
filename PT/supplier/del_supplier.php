<?php  session_start();
include '../js/conn.php';

$sql_sdel = 'DELETE FROM supply_tb WHERE SupID = "'.$_POST['id'].'" ';
$rssdel = mysql_query($sql_sdel) or die(mysql_error());

echo "Y";
?>