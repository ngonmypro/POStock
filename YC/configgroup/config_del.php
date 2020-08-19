<?php session_start();
include '../js/conn.php';

if($_POST['chk'] == 'G'){
    $sql_de1 = 'DELETE FROM equip_tb WHERE Equip_GeqCode =  "'.$_POST['id'].'" and EquipCate = "'.$_POST['id2'].'" ';
    $rsde1 = mysql_query($sql_de1) or die(mysql_error());

    $sql_de2 = 'DELETE FROM typeeq_tb WHERE Teq_GeqID =  "'.$_POST['id'].'" and TeqCate = "'.$_POST['id2'].'" ';
    $rsde2 = mysql_query($sql_de2) or die(mysql_error());

    $sql_de3 = 'DELETE FROM groupeq_tb WHERE GeqCode =  "'.$_POST['id'].'" and GeqCate = "'.$_POST['id2'].'"';
    $rsde3 = mysql_query($sql_de3) or die(mysql_error());

    echo "YG";
}elseif($_POST['chk'] == 'T'){
    $sql_de = 'DELETE FROM equip_tb WHERE Equip_TeqCode = "'.$_POST['id'].'" and Equip_GeqCode =  "'.$_POST['id3'].'" and EquipCate = "'.$_POST['id2'].'" ';
    $rsde = mysql_query($sql_de) or die(mysql_error());

    $sql_de2 = 'DELETE FROM typeeq_tb WHERE TeqCode = "'.$_POST['id'].'" and Teq_GeqID =  "'.$_POST['id3'].'" and TeqCate = "'.$_POST['id2'].'"  ';
    $rsde2 = mysql_query($sql_de2) or die(mysql_error());

    echo "YT";
}elseif($_POST['chk'] == 'E'){
    $sql_de = 'DELETE FROM equip_tb WHERE EquipCode =  "'.$_POST['id'].'" and Equip_GeqCode = "'.$_POST['id2'].'" and Equip_TeqCode = "'.$_POST['id3'].'" and EquipCate = "'.$_POST['id4'].'" ';
    $rsde = mysql_query($sql_de) or die(mysql_error());

    echo "YE";
}
?>