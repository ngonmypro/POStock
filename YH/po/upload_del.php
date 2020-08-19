<?php 
include '../js/conn.php';

$file = $_POST['name'];
if (unlink("../uploaddocument/".$file))
  {
    $sql_cod = 'DELETE FROM upfilepo_tb WHERE UpfID = "'.$_POST['id'].'" ';
    $result_cod = mysql_query($sql_cod) or die(mysql_error());

    echo "Y";
  }
  mysql_close($c);
?>