<?php session_start();
include '../js/conn.php';

if($_POST['chk'] == 1){ 
$sql = 'INSERT INTO list_tb (ListID, List_PoID, List_ProdID, ListDetail , ListTotal, ListUnit, ListPrice, ListDiscount, ListPriceTotal, ListAddTime, ListAddUser, ListEditTime, ListEditUser) VALUES (NULL, "'.$_POST['id'].'" , "'.$_POST['edpoduct'].'" , "'.$_POST['detailqe'].'" , "'.$_POST['numeee'].'" , "'.$_POST['cunitee'].'" , "'.$_POST['prieee'].'" , "'.$_POST['diseee'].'" , "'.$_POST['totaleee'].'" , NOW() , "'.$_SESSION['ssUserName'].'" , NOW() , "'.$_SESSION['ssUserName'].'" ) ';
$rs = mysql_query($sql) or die(mysql_error());

echo "Y";
}elseif($_POST['chk'] == 2){
$sql = 'UPDATE list_tb SET List_ProdID = "'.$_POST['edpoduct'].'", ListDetail = "'.$_POST['detailqe'].'" , ListTotal = "'.$_POST['numeee'].'", ListUnit = "'.$_POST['cunitee'].'", ListPrice = "'.$_POST['prieee'].'", ListDiscount = "'.$_POST['diseee'].'", ListPriceTotal = "'.$_POST['totaleee'].'", ListEditTime = NOW(), ListEditUser = "'.$_SESSION['ssUserName'].'" WHERE ListID = "'.$_POST['id2'].'" ';
$rs = mysql_query($sql) or die(mysql_error());    

echo "Y";
}elseif($_POST['chk'] == 3){
$sql = 'DELETE FROM list_tb WHERE ListID = "'.$_POST['id2'].'" ';
$rs = mysql_query($sql) or die(mysql_error());

echo "Y";
}
?>