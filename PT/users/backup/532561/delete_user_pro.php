<?php session_start();
    include '../js/conn.php';

    //echo $_POST['id'],' ',$_POST['iddelete'];
    $sql_delu = 'DELETE FROM user_tb WHERE UserID = "'.$_POST["id"].'" ';
    $result_delu = mysql_query($sql_delu) or die(mysql_error());

    mysql_close($c);
    echo "Y";
?>