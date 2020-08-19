<?php session_start(); 
include '../js/conn.php'; 


$sqle = 'SELECT * FROM stock_tb WHERE  StkID = "'.$_POST['id'].'" ';
$rse = mysql_query($sqle) or die(mysql_error());
$rwe = mysql_fetch_array($rse);
$sre = $rwe['StkTotalNow'];

if($_POST['nestk'] > $rwe['StkTotalNow']){
    $sta = 1;
}else if($_POST['nestk'] < $rwe['StkTotalNow']){
    $sta = 2;
}

//echo $sre,'/',$_POST['nestk'],'/',$sta,'/aasdasdadadasda';
$sql = 'INSERT INTO adjust_tb (AdjID, Adj_StkID, Adj_StkOldTotal, Adj_StkNewTotal, AdjStatus, AdjEditDate, AdjEditUser) VALUES (NULL , "'.$_POST['id'].'" , "'.$sre.'" , "'.$_POST['nestk'].'" , "'.$sta.'" , NOW() , "'.$_SESSION['ssUserName'].'" ) ';
$rs = mysql_query($sql) or die(mysql_error());

$sql1 = 'UPDATE stock_tb SET StkTotalNow = "'.$_POST['nestk'].'" , SktAdjstatus = "'.$sta.'" , StkEditTime = NOW() , StkEditUser = "'.$_SESSION['ssUserName'].'" WHERE StkID = "'.$_POST['id'].'" ';
$rs2 = mysql_query($sql1) or die(mysql_error());

echo "Y";
?>
