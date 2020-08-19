<?php session_start(); 
include '../js/conn.php';

$sql_apd = 'SELECT MAX(ProdNumber) as das FROM  product_tb WHERE Prod_GuoPro = "'.$_POST['grppro'].'" and Prod_Group =  "'.$_POST['grouppro'].'" and Prod_Type = "'.$_POST['tyeq'].'"and Prod_Brand = "'.$_POST['bran'].'" ';
$objapd = mysql_query($sql_apd) or die(mysql_error());
while ($row3 = mysql_fetch_array($objapd)){ 
   $tes = $row3['das']+1;
   if($tes < 10){
    $ws = "0".$tes; 
    //echo $ws;
    
    $sql_adp = 'INSERT INTO product_tb (ProdID, Prod_GuoPro, Prod_Group, Prod_Type, Prod_Brand, ProdNumber, ProdName, ProdAddTime, ProdAddUser, ProdEditTime, ProdEditUser) VALUES';
    $sql_adp.= '(NULL,"'.$_POST['grppro'].'","'.$_POST['grouppro'].'","'.$_POST['tyeq'].'","'.$_POST['bran'].'","'.$ws.'","'.$_POST['nameprd'].'",NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'")';
    $objadp = mysql_query($sql_adp) or die(mysql_error());
   }else{

    $sql_adp = 'INSERT INTO product_tb (ProdID, Prod_GuoPro, Prod_Group, Prod_Type, Prod_Brand, ProdNumber, ProdName, ProdAddTime, ProdAddUser, ProdEditTime, ProdEditUser) VALUES';
    $sql_adp.= '(NULL,"'.$_POST['grppro'].'","'.$_POST['grouppro'].'","'.$_POST['tyeq'].'","'.$_POST['bran'].'","'.$tes.'","'.$_POST['nameprd'].'",NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
    $objadp = mysql_query($sql_adp) or die(mysql_error());

   }
}
/*
$sql_adp = 'INSERT INTO product_tb (ProdID, Prod_GuoPro, Prod_Group, Prod_Type, Prod_Brand, ProdNumber, ProdName, ProdAddTime, ProdAddUser, ProdEditTime, ProdEditUser) VALUES';
$sql_adp.= '(NULL,"'.$_POST['grppro'].'","'.$_POST['grouppro'].'","'.$_POST['tyeq'].'","'.$_POST['bran'].'","'.$_POST['numpeq'].'","'.$_POST['lnameu'].'",NOW(),"'.$_SESSION['ssUserFname'].'",NOW(),"'.$_SESSION['ssUserFname'].'" ';
$objadp = mysql_query($sql_adp) or die(mysql_error());*/

echo "Y";
?>