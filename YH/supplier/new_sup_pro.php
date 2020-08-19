<?php session_start();
include '../js/conn.php';
$c2=mysql_connect($connhost,$connuser,$connpass); //เชื่อมตอ
mysql_select_db($connDB2,$c2); //เลือกติดต่อกับฐานข้อมูลที่กำหนด
mysql_query("set names utf8"); //เชื่อมต่อไปเป็นภาษาไทย
 if(!$c2){
    echo"<h3>Can't connect database!</h3>";
    exit();
}

$c3=mysql_connect($connhost,$connuser,$connpass); //เชื่อมตอ
mysql_select_db($connDB3,$c3); //เลือกติดต่อกับฐานข้อมูลที่กำหนด
mysql_query("set names utf8"); //เชื่อมต่อไปเป็นภาษาไทย
 if(!$c3){
    echo"<h3>Can't connect database!</h3>";
    exit();
}

$sql_n = 'INSERT INTO postock.supply_tb (SupID, SupName, SupAddTime, SupAddUser, SupEditTime, SupEditUser) VALUE (NULL, "'.$_POST['supnd'].'",NOW(),"'.$_SESSION['ssUserName'].'", NOW(),"'.$_SESSION['ssUserName'].'" ) ';
$rsn = mysql_query($sql_n) or die(mysql_error());
mysql_close($c);

$sql_n = 'INSERT INTO ycstock_db.supply_tb (SupID, SupName, SupAddTime, SupAddUser, SupEditTime, SupEditUser) VALUE (NULL, "'.$_POST['supnd'].'",NOW(),"'.$_SESSION['ssUserName'].'", NOW(),"'.$_SESSION['ssUserName'].'" ) ';
$rsn = mysql_query($sql_n) or die(mysql_error());
mysql_close($c2);

$sql_n = 'INSERT INTO ptstockpo_db.supply_tb (SupID, SupName, SupAddTime, SupAddUser, SupEditTime, SupEditUser) VALUE (NULL, "'.$_POST['supnd'].'",NOW(),"'.$_SESSION['ssUserName'].'", NOW(),"'.$_SESSION['ssUserName'].'" ) ';
$rsn = mysql_query($sql_n) or die(mysql_error());
mysql_close($c3);

echo "Y";
?>