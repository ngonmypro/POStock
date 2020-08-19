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

$sql = 'UPDATE postock.supply_tb SET SupName = "'.$_POST['supn'].'", SupEditTime = NOW() , SupEditUser = "'.$_SESSION['ssUserName'].'" WHERE SupID = "'.$_POST['id'].'" ';
$rs = mysql_query($sql) or die(mysql_error());
mysql_close($c);

$sql = 'UPDATE ycstock_db.supply_tb SET SupName = "'.$_POST['supn'].'", SupEditTime = NOW() , SupEditUser = "'.$_SESSION['ssUserName'].'" WHERE SupID = "'.$_POST['id'].'" ';
$rs = mysql_query($sql) or die(mysql_error());
mysql_close($c2);

$sql = 'UPDATE supply_tb SET SupName = "'.$_POST['supn'].'", SupEditTime = NOW() , SupEditUser = "'.$_SESSION['ssUserName'].'" WHERE SupID = "'.$_POST['id'].'" ';
$rs = mysql_query($sql) or die(mysql_error());
mysql_close($c3);

echo "Y";
?>