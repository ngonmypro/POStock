<?php session_start();
include '../js/conn.php';

if($_POST['chk'] == 1){
$sql = 'SELECT * FROM user_tb WHERE UserFname = "'.$_POST['fnameubeg'].'" and UserLname = "'.$_POST['lnameubeg'].'"';
$rs = mysql_query($sql) or die(mysql_error());
$rw = mysql_fetch_array($rs);

if($rw['UserFname'] != $_POST['fnameubeg'] && $rw['UserLname'] != $_POST['lnameubeg']){

$sql_das = 'INSERT INTO user_tb (UserID, UserTitle, UserFname, UserLname, UserBrah, UserDep, UserStatus, UserAddTime, UserAddUser, UserEditTime, UserEditUser) VALUES ( NULL, "'.$_POST['titlebeg'].'", "'.$_POST['fnameubeg'].'", "'.$_POST['lnameubeg'].'", "'.$_POST['brahubeg'].'", "'.$_POST['depebeg'].'","1", NOW(), "'.$_SESSION['ssUserName'].'", NOW(), "'.$_SESSION['ssUserName'].'" )';
$rsdas = mysql_query($sql_das) or die(mysql_error());

$sql_lu = 'SELECT MAX(UserID) as ueid FROM user_tb ';
$rslu = mysql_query($sql_lu) or die(mysql_error());
$row = mysql_fetch_array($rslu);
$rr = $row['ueid'];
}else{
    $rr =$rw['UserID']; 
}

$date = Date("Ymd_his");
$sql_lk = 'INSERT INTO mainbeg_tb (MbegID, Mbeg_UserbID, MbegIt_UserID, MbegCode, MbegDate, MbegStatus, MbegAddTime, MbegAddUser, MbegEditTime, MbegEditUser) VALUE ( NULL, "'.$rr.'","'.$_SESSION['ssUserID'].'", "'.$date.'", NOW(), "0", NOW(), "'.$_SESSION['ssUserName'].'", NOW(), "'.$_POST['ssUserName'].'" ) ';
$rslk = mysql_query($sql_lk) or die(mysql_error());

echo "Y";
}elseif($_POST['chk'] == 2){
$sql = 'SELECT MAX(MbegID) as mbID FROM mainbeg_tb ';
$rs = mysql_query($sql) or die(mysql_error());
$rw = mysql_fetch_array($rs);
$rr = $rw['mbID'];
$sql2 = 'INSERT INTO mainbeglist_tb (Mblist_ID, Mblist_MbegID, Mblist_ProdID, MblistTotle, MblistDetail, MblistAddTime, MblistAddUser, MblistEditTime, MblistEditUser) VALUES ( NULL , "'.$rr.'" , "'.$_POST['item3'].'" , "'.$_POST['numb3'].'" , "'.$_POST['detail3'].'" , NOW(), "'.$_SESSION['ssUserName'].'", NOW(), "'.$_SESSION['ssUserName'].'" ) ';
$rs2 = mysql_query($sql2)  or die(mysql_error());

echo "Y";
}
?>