<?php session_start();
include '../js/conn.php';

$sql_nnpo = 'SELECT max(PoID) as pnumber FROM po_tb ';
$resultnnpo = mysql_query($sql_nnpo) or die(mysql_error());
while ($rown = mysql_fetch_array($resultnnpo)) {
    

//echo $bookn,$number2;
//echo $ti;
//echo $_POST['item'],$_POST['numb'],$_POST['unit'],$_POST['prict'],$_POST['dis2'],$_POST['ptotal'];
$sql_li ='INSERT INTO list_tb (ListID,List_PoID,List_ProdID,ListTotal,ListUnit,ListPrice,ListDiscount,ListPriceTotal,ListAddTime,ListAddUser,ListEditTime,ListEditUser) VALUES ';
$sql_li.='(NULL,"'.$rown['pnumber'].'","'.$_POST['item'].'","'.$_POST['numb'].'","'.$_POST['unit'].'","'.$_POST['prict'].'","'.$_POST['dis2'].'","'.$_POST['ptotal'].'",NOW(),"'.$_SESSION['ssUserFname'].'",NOW(),"'.$_SESSION['ssUserFname'].'")';
$result_li = mysql_query($sql_li) or die(mysql_error());

mysql_close($c);
echo "Y";
 }
?>