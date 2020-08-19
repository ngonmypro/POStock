<?php session_start();
include '../js/conn.php';

if($_POST['chk'] == 1){
    $sql_sto = 'SELECT * FROM stock_tb WHERE Stk_ProdID = "'.$_POST['item2'].'"';
    $rssto = mysql_query($sql_sto);
    $rw = mysql_fetch_array($rssto);

    if($rw != 0){
        $sql_usk = 'UPDATE stock_tb SET StkTotalNow = StkTotalNow + "'.$_POST['numb2'].'" , StkEditTime = NOW() , StkEditUser = "'.$_SESSION['ssUserName'].'" WHERE Stk_ProdID = "'.$_POST['item2'].'" ';
        $rs = mysql_query($sql_usk) or die(mysql_error());

        $sql_usk2 = 'INSERT INTO instock_tb (IskID, Isk_ProdID, IskTotal, IskDetail, IskDateTime, IskInTime, IskInUser, IskEditTime, IskEditUser) VALUES (NULL,"'.$_POST['item2'].'","'.$_POST['numb2'].'","'.$_POST['detail2'].'",NOW(),NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
        $rs2 = mysql_query($sql_usk2) or die(mysql_error());
        //echo "Y";
    }else{
        $sql_stk = 'INSERT INTO stock_tb (StkID, Stk_ProdID, StkTotal, StkTotalNow, StkUnit, StkMinimum, StkAddTime, StkAddUser, StkEditTime, StkEditUser) VALUES (NULL,"'.$_POST['item2'].'","'.$_POST['numb2'].'","'.$_POST['numb2'].'","Pcs.",NULL,NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
        $rs = mysql_query($sql_stk) or die(mysql_error());

        $sql_usk2 = 'INSERT INTO instock_tb (IskID, Isk_ProdID, IskTotal, IskDetail, IskDateTime, IskInTime, IskInUser, IskEditTime, IskEditUser) VALUES (NULL,"'.$_POST['item2'].'","'.$_POST['numb2'].'","'.$_POST['detail2'].'",NOW(),NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
        $rs2 = mysql_query($sql_usk2) or die(mysql_error());
    }
	 echo "Y";

}elseif($_POST['chk'] == 2){
    $sql_dw = 'SELECT * FROM list_tb,po_tb WHERE List_PoID = "'.$_POST['fpo'].'" and PoID = "'.$_POST['fpo'].'" ';
    $rsdw = mysql_query($sql_dw) or die(mysql_error());
    while ($rowdw = mysql_fetch_array($rsdw)) {
        $sql_sto = 'SELECT * FROM stock_tb WHERE Stk_ProdID = "'.$rowdw['List_ProdID'].'"';
        $rssto = mysql_query($sql_sto);
        $rw = mysql_fetch_array($rssto);
        if($rw != 0){
            $sql_usk = 'UPDATE stock_tb SET StkTotalNow = StkTotalNow + "'.$rowdw['ListTotal'].'" , StkEditTime = NOW() , StkEditUser = "'.$_SESSION['ssUserName'].'" WHERE Stk_ProdID = "'.$rowdw['List_ProdID'].'" ';
            $rs = mysql_query($sql_usk) or die(mysql_error());
        
            $sql_usk2 = 'INSERT INTO instock_tb (IskID, Isk_ProdID, Isk_PoID, IskTotal, IskDetail, IskDateTime, IskInTime, IskInUser, IskEditTime, IskEditUser) VALUES (NULL,"'.$rowdw['List_ProdID'].'","'.$_POST['fpo'].'","'.$rowdw['ListTotal'].'","'.$rowdw['PoDetail'].'",NOW(),NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
            $rs2 = mysql_query($sql_usk2) or die(mysql_error());

            $sql_usk3 = 'UPDATE po_tb SET PoImStock = "1" WHERE PoID = "'.$_POST['fpo'].'" ';
            $rs3 = mysql_query($sql_usk3) or die(mysql_error());
        }else{
            $sql_usk = 'INSERT INTO stock_tb (StkID, Stk_ProdID, StkTotal, StkTotalNow, StkUnit, StkAddTime, StkAddUser, StkEditTime, StkEditUser) VALUES (NULL , "'.$rowdw['List_ProdID'].'" ,"'.$rowdw['ListTotal'].'" , "'.$rowdw['ListTotal'].'" , "'.$rowdw['ListUnit'].'" , NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'"  )';
            $rs = mysql_query($sql_usk) or die(mysql_error());
        
            $sql_usk2 = 'INSERT INTO instock_tb (IskID, Isk_ProdID, Isk_PoID, IskTotal, IskDetail, IskDateTime, IskInTime, IskInUser, IskEditTime, IskEditUser) VALUES (NULL,"'.$rowdw['List_ProdID'].'","'.$_POST['fpo'].'","'.$rowdw['ListTotal'].'","'.$rowdw['PoDetail'].'",NOW(),NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
            $rs2 = mysql_query($sql_usk2) or die(mysql_error());

            $sql_usk3 = 'UPDATE po_tb SET PoImStock = "1" WHERE PoID = "'.$_POST['fpo'].'" ';
            $rs3 = mysql_query($sql_usk3) or die(mysql_error());
        }

    }
    echo "Y";
}
?>