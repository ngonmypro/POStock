<?php session_start();
include '../js/conn.php';

if($_POST['chk'] == 'G'){
    $sql_edcf = 'UPDATE groupeq_tb SET GeqName = "'.$_POST['edconf'].'" , GeqEditTime = NOW() , GeqEditUser = "'.$_SESSION['ssUserName'].'" WHERE GeqID = "'.$_POST['id'].'" ';
    $rsedcf = mysql_query($sql_edcf) or die(mysql_error());

    echo "YG";

}elseif($_POST['chk'] == 'T'){
    $sql_edcf = 'UPDATE typeeq_tb SET TeqName = "'.$_POST['edconf'].'" , TeqEditTime = NOW() , TeqEditUser = "'.$_SESSION['ssUserName'].'" WHERE TeqID = "'.$_POST['id'].'" ';
    $rsedcf = mysql_query($sql_edcf) or die(mysql_error());
    
    echo "YT";

}elseif($_POST['chk'] == 'E'){
    $sql_edcf = 'UPDATE equip_tb SET EquipName = "'.$_POST['edconf'].'" , TeqEditTime = NOW() , TeqEditUser = "'.$_SESSION['ssUserName'].'" WHERE EquipID = "'.$_POST['id'].'" ';
    $rsedcf = mysql_query($sql_edcf) or die(mysql_error());
    
    echo "YE";

}
?>