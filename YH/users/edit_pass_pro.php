<?php session_start();
include '../js/conn.php';

$pass = MD5($_POST['passs1']);
$sql = 'UPDATE user_tb Set UserPass = "'.$pass.'" , UserEditTime = NOW() ,  UserEditUser = "'.$_SESSION['ssUserName'].'" WHERE UserID = "'.$_SESSION['ssUserID'].'" ';
$rs = mysql_query($sql) or die(mysql_error());

echo "Y";
?>