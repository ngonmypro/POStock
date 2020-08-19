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

    //echo $_POST['id'],' adsadsasdas';
    $sql_prodeid = 'UPDATE postock.product_tb SET Prod_GuoPro = "'.$_POST['grpproe'].'", Prod_Group = "'.$_POST['groupproe'].'" , Prod_Type = "'.$_POST['tyeqe'].'" , Prod_Brand = "'.$_POST['brane'].'" , ProdName = "'.$_POST['nameprde'].'" , ProdEditTime = NOW() , ProdEditUser = "'.$_SESSION['ssUserName'].'" WHERE prodID = "'.$_POST['id'].'" ';
    $result_prodeid = mysql_query($sql_prodeid) or die(mysql_error());
    mysql_close($c);
    $sql_prodeid2 = 'UPDATE ycstock_db.product_tb SET Prod_GuoPro = "'.$_POST['grpproe'].'", Prod_Group = "'.$_POST['groupproe'].'" , Prod_Type = "'.$_POST['tyeqe'].'" , Prod_Brand = "'.$_POST['brane'].'" , ProdName = "'.$_POST['nameprde'].'" , ProdEditTime = NOW() , ProdEditUser = "'.$_SESSION['ssUserName'].'" WHERE prodID = "'.$_POST['id'].'" ';
    $result_prodeid2 = mysql_query($sql_prodeid2) or die(mysql_error());
    mysql_close($c2);
    $sql_prodeid3 = 'UPDATE ptstockpo_db.product_tb SET Prod_GuoPro = "'.$_POST['grpproe'].'", Prod_Group = "'.$_POST['groupproe'].'" , Prod_Type = "'.$_POST['tyeqe'].'" , Prod_Brand = "'.$_POST['brane'].'" , ProdName = "'.$_POST['nameprde'].'" , ProdEditTime = NOW() , ProdEditUser = "'.$_SESSION['ssUserName'].'" WHERE prodID = "'.$_POST['id'].'" ';
    $result_prodeid3 = mysql_query($sql_prodeid3) or die(mysql_error());
    mysql_close($c3);

    echo "Y";
?>