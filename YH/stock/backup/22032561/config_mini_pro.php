<?php session_start();
include '../js/conn.php';

$sql_d = 'UPDATE stock_tb SET StkMinimum = "'.$_POST['id'].'",StkEditTime = NOW() , StkEditUser = "'.$_SESSION['ssUserName'].'" WHERE StkID = "'.$_POST['id'].'" ';
$rsd = mysql_query($sql_d) or die(mysql_error());

echo "Y";

?>