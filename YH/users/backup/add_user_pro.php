<?php session_start();
include '../js/conn.php';
//echo $_POST['useru'],' ',$_POST['passu'],' ',$_POST['namefu'],' ',$_POST['namelu'];

$passmd = MD5($_POST['passu']);

$sql_addu = 'INSERT INTO user_tb (UserID, UserCode, UserTitle, UserFname, UserLname, UserName, UserPass, UserBrah, UserDep, UserStatus, UserAddTime, UserAddUser, UserEditTime, UserEditUser) VALUES (NULL,"'.$_POST["codeu"].'", "'.$_POST["titleu"].'" ,"'.$_POST["fnameu"].'","'.$_POST["lnameu"].'", "'.$_POST["useru"].'", "'.$passmd.'","'.$_POST["brahu"].'","'.$_POST["depe"].'", "'.$_POST["statusu"].'",NOW(),"'.$_SESSION["ssUserName"].'",NOW(),"'.$_SESSION["ssUserName"].'") ';
$result_addu = mysql_query($sql_addu) or die(mysql_error());

mysql_close($c);
echo "Y";


?>
