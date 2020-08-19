<?php session_start();
include '../js/conn.php';

$sql = 'UPDATE po_tb SET Po_BrahID = "'.$_POST['brahpo'].'" , Po_SupID = "'.$_POST['suppo'].'" , PoDetail = "'.$_POST['poeddet'].'" , PoPriceAll = "'.$_POST['sumpaee'].'" , PoPriceNvat = "'.$_POST['sumnvatee'].'" , PoVat = "'.$_POST['sumvatee'].'" , PoPriceTotal = "'.$_POST['sumtotalee'].'" , PoEditTime = NOW() , PoEditUser = "'.$_SESSION['ssUserName'].'" WHERE PoID = "'.$_POST['id'].'" ';
$rs = mysql_query($sql) or die(mysql_error());

echo "Y";
?>