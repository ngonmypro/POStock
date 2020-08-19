<?php session_start();
include '../js/conn.php';

if($_POST['chk'] == 'G'){
 $sql_cc = 'SELECT MAX(GeqCode) AS total FROM groupeq_tb WHERE GeqCate = "'.$_POST['ngr'].'"';
 $rscc = mysql_query($sql_cc) or die(mysql_error());
 $row = mysql_fetch_array($rscc);
 if(!isset($row['total'])){
     $new = '0';
 }else{
    $new = $row['total']+1;
 }
    $sql_nw = 'INSERT INTO groupeq_tb (GeqID, GeqCode, GeqName, GeqCate, GeqAddTime, GeqAddUser, GeqEditTime, GeqEditUser) VALUES (NULL,"'.$new.'","'.$_POST['ngrn'].'","'.$_POST['ngr'].'",NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ' ;
    $rsnw = mysql_query($sql_nw) or die(mysql_error());

    echo 'YG';
}elseif($_POST['chk'] == 'T'){
    $sql_cc = 'SELECT MAX(TeqCode) AS total FROM typeeq_tb WHERE Teq_GeqID = "'.$_POST['id'].'" and TeqCate = "'.$_POST['id2'].'" ';
    $rscc = mysql_query($sql_cc) or die(mysql_error());
    $row = mysql_fetch_array($rscc);
    if(!isset($row['total'])){
        $new = '0';
    }else{
       $new = $row['total']+1;
    }
   
       $sql_nw = 'INSERT INTO typeeq_tb (TeqID, TeqCode, Teq_GeqID, TeqName, TeqCate, TeqAddTime, TeqAddUser, TeqEditTime, TeqEditUser) VALUES (NULL,"'.$new.'","'.$_POST['id'].'","'.$_POST['nty'].'","'.$_POST['id2'].'",NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ' ;
       $rsnw = mysql_query($sql_nw) or die(mysql_error());
   
       echo 'YT';
}elseif($_POST['chk'] == 'E'){
    $sql_cc = 'SELECT MAX(EquipCode) AS total FROM equip_tb WHERE Equip_GeqCode = "'.$_POST['id2'].'" and Equip_TeqCode = "'.$_POST['id'].'" and EquipCate = "'.$_POST['id3'].'" ';
    $rscc = mysql_query($sql_cc) or die(mysql_error());
    $row = mysql_fetch_array($rscc);
    if(!isset($row['total'])){
        $new = '0';
    }else{
       $new = $row['total']+1;
    }
   
       $sql_nw = 'INSERT INTO equip_tb (EquipID, EquipCode, Equip_GeqCode, Equip_TeqCode, EquipName, EquipCate, EquipAddTime, EquipAddUser, EquipEditTime, EquipEditUser) VALUES (NULL,"'.$new.'","'.$_POST['id2'].'","'.$_POST['id'].'","'.$_POST['neq'].'","'.$_POST['id3'].'",NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ' ;
       $rsnw = mysql_query($sql_nw) or die(mysql_error());
   
       echo 'YE';
}
?>