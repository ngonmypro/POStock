<?php session_start();
    include '../js/conn.php';

    //echo $_POST['id'],' adsadsasdas';
    $sql_prodid = 'DELETE FROM product_tb WHERE ProdID = "'.$_POST["id"].'" ';
    $result_prodid = mysql_query($sql_prodid) or die(mysql_error());

    mysql_close($c);
    echo "Y";
?>