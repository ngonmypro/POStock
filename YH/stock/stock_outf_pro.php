<?php session_start();
include '../js/conn.php';

if($_POST['chk'] == 1){
$sql = 'UPDATE mainbeg_tb SET MbegStatus = "1" ,MbegDateConf = NOW() ,MbegEditTime = NOW() , MbegEditUser = "'.$_SESSION['ssUserName'].'" WHERE MbegID = "'.$_POST['id'].'" ';
$sr = mysql_query($sql) or die(mysql_error());

$sqll = 'SELECT * FROM mainbeglist_tb WHERE Mblist_MbegID = "'.$_POST['id'].'" ';
$rss = mysql_query($sqll) or die(mysql_error());
while($rwq = mysql_fetch_array($rss)){
$sqql = 'UPDATE stock_tb SET StkTotalNow = StkTotalNow - "'.$rwq['MblistTotle'].'" WHERE Stk_ProdID = "'.$rwq['Mblist_ProdID'].'" ';
$rsq = mysql_query($sqql) or die(mysql_error());
}

echo "Y";
}elseif($_POST['chk'] == 2){
    $sql = 'DELETE FROM mainbeglist_tb WHERE Mblist_MbegID = "'.$_POST['id'].'" ';
    $rs = mysql_query($sql) or die(mysql_error());

    $sql2 = 'DELETE FROM mainbeg_tb WHERE MbegID = "'.$_POST['id'].'" ';
    $rs2 = mysql_query($sql2) or die(mysql_error());

    echo "Y";
}
?>