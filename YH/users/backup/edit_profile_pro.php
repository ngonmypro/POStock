<?php session_start();
include '../js/conn.php';

$sql_pfe = 'UPDATE user_tb SET UserCode = "'.$_POST['codee'].'" , UserTitle = "'.$_POST['titlee'].'" , UserFname = "'.$_POST['fnamee'].'" , UserLname = "'.$_POST['lnamee'].'" , UserName = "'.$_POST['usere'].'" , UserBrah = "'.$_POST['brahe'].'" , UserDep = "'.$_POST['depe'].'" , UserEditTime = NOW() , UserEditUser = "'.$_SESSION['ssUserName'].'" WHERE UserID = "'.$_SESSION['ssUserID'].'" ';
$rspfe = mysql_query($sql_pfe) or die(mysql_error());

echo "Y";
?>