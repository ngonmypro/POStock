<?php session_start();
include '../js/conn.php';

$sql = 'UPDATE po_tb SET PoStatus = "2" , PoApproveUser = "'.$_SESSION['ssUserName'].'" , PoApproveDate = NOW() ,PoEditTime = NOW(), PoEditUser = "'.$_SESSION['ssUserName'].'" WHERE PoID = "'.$_POST['id'].'" ';
$rs = mysql_query($sql) or die(mysql_error());

echo "Y";
?>