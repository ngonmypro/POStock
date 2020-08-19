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
//---------------------------------------------------------------YH
$sql = 'SELECT MAX(ProdNumber) as das FROM  postock.product_tb WHERE Prod_GuoPro = "'.$_POST['grppro'].'" and Prod_Group =  "'.$_POST['grouppro'].'" and Prod_Type = "'.$_POST['tyeq'].'"and Prod_Brand = "'.$_POST['bran'].'" ';
$obj = mysql_query($sql) or die(mysql_error());
while ($row = mysql_fetch_array($obj)){ 
   $tes = $row['das']+1;
   if($tes < 10){
    $ws = "0".$tes; 
    //echo $ws;
    
    $sql_adp = 'INSERT INTO postock.product_tb (ProdID, Prod_GuoPro, Prod_Group, Prod_Type, Prod_Brand, ProdNumber, ProdName, ProdAddTime, ProdAddUser, ProdEditTime, ProdEditUser) VALUES';
    $sql_adp.= '(NULL,"'.$_POST['grppro'].'","'.$_POST['grouppro'].'","'.$_POST['tyeq'].'","'.$_POST['bran'].'","'.$ws.'","'.$_POST['nameprd'].'",NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'")';
    $objadp = mysql_query($sql_adp) or die(mysql_error());
   }else{

    $sql_adp = 'INSERT INTO postock.product_tb (ProdID, Prod_GuoPro, Prod_Group, Prod_Type, Prod_Brand, ProdNumber, ProdName, ProdAddTime, ProdAddUser, ProdEditTime, ProdEditUser) VALUES';
    $sql_adp.= '(NULL,"'.$_POST['grppro'].'","'.$_POST['grouppro'].'","'.$_POST['tyeq'].'","'.$_POST['bran'].'","'.$tes.'","'.$_POST['nameprd'].'",NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
    $objadp = mysql_query($sql_adp) or die(mysql_error());

   }
}
mysql_close($c);
//---------------------------------------------------------------YC
$sql = 'SELECT MAX(ProdNumber) as das FROM  ycstock_db.product_tb WHERE Prod_GuoPro = "'.$_POST['grppro'].'" and Prod_Group =  "'.$_POST['grouppro'].'" and Prod_Type = "'.$_POST['tyeq'].'"and Prod_Brand = "'.$_POST['bran'].'" ';
$obj = mysql_query($sql) or die(mysql_error());
while ($row = mysql_fetch_array($obj)){ 
   $tes = $row['das']+1;
   if($tes < 10){
    $ws = "0".$tes; 
    //echo $ws;
   
    $sql_adp = 'INSERT INTO ycstock_db.product_tb (ProdID, Prod_GuoPro, Prod_Group, Prod_Type, Prod_Brand, ProdNumber, ProdName, ProdAddTime, ProdAddUser, ProdEditTime, ProdEditUser) VALUES';
    $sql_adp.= '(NULL,"'.$_POST['grppro'].'","'.$_POST['grouppro'].'","'.$_POST['tyeq'].'","'.$_POST['bran'].'","'.$ws.'","'.$_POST['nameprd'].'",NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'")';
    $objadp = mysql_query($sql_adp) or die(mysql_error());
   }else{

    $sql_adp = 'INSERT INTO ycstock_db.product_tb (ProdID, Prod_GuoPro, Prod_Group, Prod_Type, Prod_Brand, ProdNumber, ProdName, ProdAddTime, ProdAddUser, ProdEditTime, ProdEditUser) VALUES';
    $sql_adp.= '(NULL,"'.$_POST['grppro'].'","'.$_POST['grouppro'].'","'.$_POST['tyeq'].'","'.$_POST['bran'].'","'.$tes.'","'.$_POST['nameprd'].'",NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
    $objadp = mysql_query($sql_adp) or die(mysql_error());

   }
}
mysql_close($c2);
//---------------------------------------------------------------PT
$sql = 'SELECT MAX(ProdNumber) as das FROM  ptstockpo_db.product_tb WHERE Prod_GuoPro = "'.$_POST['grppro'].'" and Prod_Group =  "'.$_POST['grouppro'].'" and Prod_Type = "'.$_POST['tyeq'].'"and Prod_Brand = "'.$_POST['bran'].'" ';
$obj = mysql_query($sql) or die(mysql_error());
while ($row = mysql_fetch_array($obj)){ 
   $tes = $row['das']+1;
   if($tes < 10){
    $ws = "0".$tes; 
    //echo $ws;
    
    $sql_adp = 'INSERT INTO ptstockpo_db.product_tb (ProdID, Prod_GuoPro, Prod_Group, Prod_Type, Prod_Brand, ProdNumber, ProdName, ProdAddTime, ProdAddUser, ProdEditTime, ProdEditUser) VALUES';
    $sql_adp.= '(NULL,"'.$_POST['grppro'].'","'.$_POST['grouppro'].'","'.$_POST['tyeq'].'","'.$_POST['bran'].'","'.$ws.'","'.$_POST['nameprd'].'",NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'")';
    $objadp = mysql_query($sql_adp) or die(mysql_error());
   }else{

    $sql_adp = 'INSERT INTO ptstockpo_db.product_tb (ProdID, Prod_GuoPro, Prod_Group, Prod_Type, Prod_Brand, ProdNumber, ProdName, ProdAddTime, ProdAddUser, ProdEditTime, ProdEditUser) VALUES';
    $sql_adp.= '(NULL,"'.$_POST['grppro'].'","'.$_POST['grouppro'].'","'.$_POST['tyeq'].'","'.$_POST['bran'].'","'.$tes.'","'.$_POST['nameprd'].'",NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
    $objadp = mysql_query($sql_adp) or die(mysql_error());

   }
}
mysql_close($c3);

echo "Y";
?>