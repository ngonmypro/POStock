<?php session_start();
    include '../js/conn.php';

    //echo $_POST['id'],' adsadsasdas';
    $sql_prodeid = 'UPDATE product_tb SET Prod_GuoPro = "'.$_POST['grpproe'].'", Prod_Group = "'.$_POST['groupproe'].'" , Prod_Type = "'.$_POST['tyeqe'].'" , Prod_Brand = "'.$_POST['brane'].'" , ProdName = "'.$_POST['nameprde'].'" , ProdEditTime = NOW() , ProdEditUser = "'.$_SESSION['ssUserName'].'" WHERE prodID = "'.$_POST['id'].'" ';
    $result_prodeid = mysql_query($sql_prodeid) or die(mysql_error());

    mysql_close($c);
    echo "Y";
?>