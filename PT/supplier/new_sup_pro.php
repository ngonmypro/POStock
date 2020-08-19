<?php session_start();
include '../js/conn.php';

$sql_n = 'INSERT INTO supply_tb (SupID, SupName, SupAddTime, SupAddUser, SupEditTime, SupEditUser) VALUE (NULL, "'.$_POST['supnd'].'",NOW(),"'.$_SESSION['ssUserName'].'", NOW(),"'.$_SESSION['ssUserName'].'" ) ';
$rsn = mysql_query($sql_n) or die(mysql_error());

echo "Y";
?>