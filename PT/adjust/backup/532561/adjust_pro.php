<?php session_start(); 
include '../js/conn.php'; 


$sqle = 'SELECT * FROM stock_tb WHERE  StkID = "'.$_POST['id'].'" ';
$rse = mysql_query($sqle) or die(mysql_error());
$rwe = mysql_fetch_array($rse);
$sre = $rwe['StkTotalNow'];


$sql = 'INSERT INTO adjust_tb (AdjID, Adj_StkID, Adj_StkOldTotal, Adj_StkNewTotal, AdjEditDate, AdjEditUser) VALUES (NULL , "'.$_POST['id'].'" , "'.$sre.'" , "'.$_POST['nestk'].'" , NOW() , "'.$_SESSION['ssUserName'].'" ) ';
$rs = mysql_query($sql) or die(mysql_error());

echo "Y";
?>
