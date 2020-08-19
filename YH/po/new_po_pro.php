<?php session_start();
include '../js/conn.php';
$bookn=date("y")+43;

$sql_dpo = 'SELECT max(PoNumber) as pnumber FROM po_tb ';
$resultdpo = mysql_query($sql_dpo) or die(mysql_error());
while ($rowd = mysql_fetch_array($resultdpo)) {
    $number1 = $rowd['pnumber']+1; 
    if($number1 < 10){
        $number2 = "000".$number1;
    }elseif ($number1 < 100) {
        $number2 = "00".$number1;
    }elseif ($number1 < 1000) {
        $number2 = "0".$number1;
    }else{
        $number2 = $number1;
    }
}

//echo $bookn,$number2;
//echo $ti;

if($_POST['pochnum'] == 1){
$sql_npo = 'INSERT INTO po_tb (PoID,PoBook,PoNumber,PoDate,PoComp,Po_BrahID,Po_SupID,PoDetail,PoPriceAll,PoPriceNvat,PoVat,PoPriceTotal,PoStatus,PoApprName,Po_UserID,PoAddTime,PoAddUser,PoEditTime,PoEditUser,PoImStock) VALUES ';
$sql_npo.= '(NULL,"'.$bookn.'","'.$number2.'",NOW(),"'.$_POST['compo'].'","'.$_POST['brahpo'].'","'.$_POST['suppo'].'","'.$_POST['detailpo'].'","'.$_POST['sumpa'].'","'.$_POST['sumnvat'].'","'.$_POST['sumvat'].'","'.$_POST['sumtotal'].'","2","'.$_POST['apprna'].'","'.$_SESSION['ssUserID'].'",NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'","'.$_POST['stoinot'].'")';
$result_npo = mysql_query($sql_npo) or die(mysql_error());

mysql_close($c);
echo "Y";
}else{
$sql_npo = 'INSERT INTO po_tb (PoID,PoBook,PoNumber,PoDate,PoComp,Po_BrahID,Po_SupID,PoDetail,PoPriceAll,PoPriceNvat,PoVat,PoPriceTotal,PoStatus,PoApprName,Po_UserID,PoAddTime,PoAddUser,PoEditTime,PoEditUser,PoImStock) VALUES ';
$sql_npo.= '(NULL,"'.$bookn.'",NULL,NOW(),"'.$_POST['compo'].'","'.$_POST['brahpo'].'","'.$_POST['suppo'].'","'.$_POST['detailpo'].'","'.$_POST['sumpa'].'","'.$_POST['sumnvat'].'","'.$_POST['sumvat'].'","'.$_POST['sumtotal'].'","2", "'.$_POST['apprna'].'" ,"'.$_SESSION['ssUserID'].'",NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'","'.$_POST['stoinot'].'")';
$result_npo = mysql_query($sql_npo) or die(mysql_error());

mysql_close($c);
echo "Y";
}
?>