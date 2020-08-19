<?php session_start(); 
include '../js/conn.php';
//echo $_POST['id'],' ',$_POST["userue"];


if($_POST['passee'] > 18){
    $passmded = MD5($_POST['passee']);
}else{
    $passmded = $_POST['passee'];
}

$sql_ued = 'UPDATE user_tb SET UserCode = "'.$_POST['codeee'].'" , UserTitle = "'.$_POST['titlee'].'" , UserFname = "'.$_POST['fnameee'].'" , UserLname = "'.$_POST['lnameee'].'" , UserName = "'.$_POST['useree'].'" , UserPass = "'.$passmded.'" , UserBrah = "'.$_POST['brahee'].'" , UserDep = "'.$_POST['depee'].'" , UserEditTime = NOW() , UserEditUser = "'.$_SESSION['ssUserName'].'" WHERE UserID = "'.$_POST["id"].'" ';
$result_ued = mysql_query($sql_ued) or die(mysql_error());

mysql_close($c);
echo "Y";
?>