<?php  session_start();
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


$sql_sdel = 'DELETE FROM postock.supply_tb WHERE SupID = "'.$_POST['id'].'" ';
$rssdel = mysql_query($sql_sdel) or die(mysql_error());
mysql_close($c);
$sql_sdel = 'DELETE FROM ycstock_db.supply_tb WHERE SupID = "'.$_POST['id'].'" ';
$rssdel = mysql_query($sql_sdel) or die(mysql_error());
mysql_close($c2);
$sql_sdel = 'DELETE FROM ycstockpo_db.ptstockpo_db.supply_tb WHERE SupID = "'.$_POST['id'].'" ';
$rssdel = mysql_query($sql_sdel) or die(mysql_error());
mysql_close($c3);
echo "Y";
?>