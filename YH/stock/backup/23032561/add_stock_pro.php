<?php session_start();
include '../js/conn.php';

	$c2=mysql_connect($connhost,$connuser,$connpass); //�������
	mysql_select_db($connDB2,$c2); //���͡�Դ��͡Ѻ�ҹ�����ŷ���˹�
	mysql_query("set names utf8"); //�����������������
 	if(!$c2){
		echo"<h3>Can't connect database!</h3>";
		exit();
	}

	$c3=mysql_connect($connhost,$connuser,$connpass); //�������
	mysql_select_db($connDB3,$c3); //���͡�Դ��͡Ѻ�ҹ�����ŷ���˹�
	mysql_query("set names utf8"); //�����������������
 	if(!$c3){
		echo"<h3>Can't connect database!</h3>";
		exit();
	}


if($_POST['chk'] == 1){
    //----------------------------------------------------------------------------------------YH
    $sql_sto = 'SELECT * FROM postock.stock_tb WHERE Stk_ProdID = "'.$_POST['item2'].'"';
    $rssto = mysql_query($sql_sto);
    $rw = mysql_fetch_array($rssto);

    if($rw != 0){
        $sql_usk = 'UPDATE postock.stock_tb SET StkTotalNow = StkTotalNow + "'.$_POST['numb2'].'" , StkEditTime = NOW() , StkEditUser = "'.$_SESSION['ssUserName'].'" WHERE Stk_ProdID = "'.$_POST['item2'].'" ';
        $rs = mysql_query($sql_usk) or die(mysql_error());

        $sql_usk2 = 'INSERT INTO postock.instock_tb (IskID, Isk_ProdID, IskTotal, IskDetail, IskDateTime, IskInTime, IskInUser, IskEditTime, IskEditUser) VALUES (NULL,"'.$_POST['item2'].'","'.$_POST['numb2'].'","'.$_POST['detail2'].'",NOW(),NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
        $rs2 = mysql_query($sql_usk2) or die(mysql_error());
    }else{
        $sql_stk = 'INSERT INTO postock.stock_tb (StkID, Stk_ProdID, StkTotal, StkTotalNow, StkUnit, StkMinimum, StkAddTime, StkAddUser, StkEditTime, StkEditUser) VALUES (NULL,"'.$_POST['item2'].'","'.$_POST['numb2'].'","'.$_POST['numb2'].'","Pcs.",NULL,NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
        $rs = mysql_query($sql_stk) or die(mysql_error());

        $sql_usk2 = 'INSERT INTO postock.instock_tb (IskID, Isk_ProdID, IskTotal, IskDetail, IskDateTime, IskInTime, IskInUser, IskEditTime, IskEditUser) VALUES (NULL,"'.$_POST['item2'].'","'.$_POST['numb2'].'","'.$_POST['detail2'].'",NOW(),NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
        $rs2 = mysql_query($sql_usk2) or die(mysql_error());
    }
    //----------------------------------------------------------------------------------------YC
    $sql_sto = 'SELECT * FROM ycstock_db.stock_tb WHERE Stk_ProdID = "'.$_POST['item2'].'"';
    $rssto = mysql_query($sql_sto);
    $rw = mysql_fetch_array($rssto);

    if($rw != 0){
        $sql_usk = 'UPDATE ycstock_db.stock_tb SET StkTotalNow = StkTotalNow + "'.$_POST['numb2'].'" , StkEditTime = NOW() , StkEditUser = "'.$_SESSION['ssUserName'].'" WHERE Stk_ProdID = "'.$_POST['item2'].'" ';
        $rs = mysql_query($sql_usk) or die(mysql_error());

        $sql_usk2 = 'INSERT INTO ycstock_db.instock_tb (IskID, Isk_ProdID, IskTotal, IskDetail, IskDateTime, IskInTime, IskInUser, IskEditTime, IskEditUser) VALUES (NULL,"'.$_POST['item2'].'","'.$_POST['numb2'].'","'.$_POST['detail2'].'",NOW(),NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
        $rs2 = mysql_query($sql_usk2) or die(mysql_error());
    }else{
        $sql_stk = 'INSERT INTO ycstock_db.stock_tb (StkID, Stk_ProdID, StkTotal, StkTotalNow, StkUnit, StkMinimum, StkAddTime, StkAddUser, StkEditTime, StkEditUser) VALUES (NULL,"'.$_POST['item2'].'","'.$_POST['numb2'].'","'.$_POST['numb2'].'","Pcs.",NULL,NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
        $rs = mysql_query($sql_stk) or die(mysql_error());

        $sql_usk2 = 'INSERT INTO ycstock_db.instock_tb (IskID, Isk_ProdID, IskTotal, IskDetail, IskDateTime, IskInTime, IskInUser, IskEditTime, IskEditUser) VALUES (NULL,"'.$_POST['item2'].'","'.$_POST['numb2'].'","'.$_POST['detail2'].'",NOW(),NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
        $rs2 = mysql_query($sql_usk2) or die(mysql_error());
    }
    //----------------------------------------------------------------------------------------PT
    $sql_sto = 'SELECT * FROM ptstockpo_db.stock_tb WHERE Stk_ProdID = "'.$_POST['item2'].'"';
    $rssto = mysql_query($sql_sto);
    $rw = mysql_fetch_array($rssto);

    if($rw != 0){
        $sql_usk = 'UPDATE ptstockpo_db.stock_tb SET StkTotalNow = StkTotalNow + "'.$_POST['numb2'].'" , StkEditTime = NOW() , StkEditUser = "'.$_SESSION['ssUserName'].'" WHERE Stk_ProdID = "'.$_POST['item2'].'" ';
        $rs = mysql_query($sql_usk) or die(mysql_error());

        $sql_usk2 = 'INSERT INTO ptstockpo_db.instock_tb (IskID, Isk_ProdID, IskTotal, IskDetail, IskDateTime, IskInTime, IskInUser, IskEditTime, IskEditUser) VALUES (NULL,"'.$_POST['item2'].'","'.$_POST['numb2'].'","'.$_POST['detail2'].'",NOW(),NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
        $rs2 = mysql_query($sql_usk2) or die(mysql_error());
    }else{
        $sql_stk = 'INSERT INTO ptstockpo_db.stock_tb (StkID, Stk_ProdID, StkTotal, StkTotalNow, StkUnit, StkMinimum, StkAddTime, StkAddUser, StkEditTime, StkEditUser) VALUES (NULL,"'.$_POST['item2'].'","'.$_POST['numb2'].'","'.$_POST['numb2'].'","Pcs.",NULL,NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
        $rs = mysql_query($sql_stk) or die(mysql_error());

        $sql_usk2 = 'INSERT INTO ptstockpo_db.instock_tb (IskID, Isk_ProdID, IskTotal, IskDetail, IskDateTime, IskInTime, IskInUser, IskEditTime, IskEditUser) VALUES (NULL,"'.$_POST['item2'].'","'.$_POST['numb2'].'","'.$_POST['detail2'].'",NOW(),NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
        $rs2 = mysql_query($sql_usk2) or die(mysql_error());
    }
    echo "Y";
    //----------------------------------------------------------------------------------------
}elseif($_POST['chk'] == 2){
    //----------------------------------------------------------------------------------------YH
    $sql_dw = 'SELECT * FROM postock.list_tb,postock.po_tb WHERE List_PoID = "'.$_POST['fpo'].'" and PoID = "'.$_POST['fpo'].'" ';
    $rsdw = mysql_query($sql_dw) or die(mysql_error());
    while ($rowdw = mysql_fetch_array($rsdw)) {
        $sql_sto = 'SELECT * FROM postock.stock_tb WHERE Stk_ProdID = "'.$rowdw['List_ProdID'].'"';
        $rssto = mysql_query($sql_sto);
        $rw = mysql_fetch_array($rssto);
        if($rw != 0){
            $sql_usk = 'UPDATE postock.stock_tb SET StkTotalNow = StkTotalNow + "'.$rowdw['ListTotal'].'" , StkEditTime = NOW() , StkEditUser = "'.$_SESSION['ssUserName'].'" WHERE Stk_ProdID = "'.$rowdw['List_ProdID'].'" ';
            $rs = mysql_query($sql_usk) or die(mysql_error());
        
            $sql_usk2 = 'INSERT INTO postock.instock_tb (IskID, Isk_ProdID, Isk_PoID, IskTotal, IskDetail, IskDateTime, IskInTime, IskInUser, IskEditTime, IskEditUser) VALUES (NULL,"'.$rowdw['List_ProdID'].'","'.$_POST['fpo'].'","'.$rowdw['ListTotal'].'","'.$rowdw['PoDetail'].'",NOW(),NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
            $rs2 = mysql_query($sql_usk2) or die(mysql_error());

            $sql_usk3 = 'UPDATE postock.po_tb SET PoImStock = "1" WHERE PoID = "'.$_POST['fpo'].'" ';
            $rs3 = mysql_query($sql_usk3) or die(mysql_error());
        }else{
            $sql_usk = 'INSERT INTO postock.stock_tb (StkID, Stk_ProdID, StkTotal, StkTotalNow, StkUnit, StkAddTime, StkAddUser, StkEditTime, StkEditUser) VALUES (NULL , "'.$rowdw['List_ProdID'].'" ,"'.$rowdw['ListTotal'].'" , "'.$rowdw['ListTotal'].'" , "'.$rowdw['ListUnit'].'" , NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'"  )';
            $rs = mysql_query($sql_usk) or die(mysql_error());
        
            $sql_usk2 = 'INSERT INTO postock.instock_tb (IskID, Isk_ProdID, Isk_PoID, IskTotal, IskDetail, IskDateTime, IskInTime, IskInUser, IskEditTime, IskEditUser) VALUES (NULL,"'.$rowdw['List_ProdID'].'","'.$_POST['fpo'].'","'.$rowdw['ListTotal'].'","'.$rowdw['PoDetail'].'",NOW(),NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
            $rs2 = mysql_query($sql_usk2) or die(mysql_error());

            $sql_usk3 = 'UPDATE postock.po_tb SET PoImStock = "1" WHERE PoID = "'.$_POST['fpo'].'" ';
            $rs3 = mysql_query($sql_usk3) or die(mysql_error());
        }

    }
    //----------------------------------------------------------------------------------------YC
    $sql_dw = 'SELECT * FROM postock.list_tb,postock.po_tb WHERE List_PoID = "'.$_POST['fpo'].'" and PoID = "'.$_POST['fpo'].'" ';
    $rsdw = mysql_query($sql_dw) or die(mysql_error());
    while ($rowdw = mysql_fetch_array($rsdw)) {
        $sql_sto = 'SELECT * FROM ycstock_db.stock_tb WHERE Stk_ProdID = "'.$rowdw['List_ProdID'].'"';
        $rssto = mysql_query($sql_sto);
        $rw = mysql_fetch_array($rssto);
        if($rw != 0){
            $sql_usk = 'UPDATE ycstock_db.stock_tb SET StkTotalNow = StkTotalNow + "'.$rowdw['ListTotal'].'" , StkEditTime = NOW() , StkEditUser = "'.$_SESSION['ssUserName'].'" WHERE Stk_ProdID = "'.$rowdw['List_ProdID'].'" ';
            $rs = mysql_query($sql_usk) or die(mysql_error());
        
            $sql_usk2 = 'INSERT INTO ycstock_db.instock_tb (IskID, Isk_ProdID, Isk_PoID, IskTotal, IskDetail, IskDateTime, IskInTime, IskInUser, IskEditTime, IskEditUser) VALUES (NULL,"'.$rowdw['List_ProdID'].'","'.$_POST['fpo'].'","'.$rowdw['ListTotal'].'","'.$rowdw['PoDetail'].'",NOW(),NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
            $rs2 = mysql_query($sql_usk2) or die(mysql_error());
        }else{
            $sql_usk = 'INSERT INTO ycstock_db.stock_tb (StkID, Stk_ProdID, StkTotal, StkTotalNow, StkUnit, StkAddTime, StkAddUser, StkEditTime, StkEditUser) VALUES (NULL , "'.$rowdw['List_ProdID'].'" ,"'.$rowdw['ListTotal'].'" , "'.$rowdw['ListTotal'].'" , "'.$rowdw['ListUnit'].'" , NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'"  )';
            $rs = mysql_query($sql_usk) or die(mysql_error());
        
            $sql_usk2 = 'INSERT INTO ycstock_db.instock_tb (IskID, Isk_ProdID, Isk_PoID, IskTotal, IskDetail, IskDateTime, IskInTime, IskInUser, IskEditTime, IskEditUser) VALUES (NULL,"'.$rowdw['List_ProdID'].'","'.$_POST['fpo'].'","'.$rowdw['ListTotal'].'","'.$rowdw['PoDetail'].'",NOW(),NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
            $rs2 = mysql_query($sql_usk2) or die(mysql_error());
        }

    }
    //----------------------------------------------------------------------------------------PT
    $sql_dw = 'SELECT * FROM postock.list_tb,postock.po_tb WHERE List_PoID = "'.$_POST['fpo'].'" and PoID = "'.$_POST['fpo'].'" ';
    $rsdw = mysql_query($sql_dw) or die(mysql_error());
    while ($rowdw = mysql_fetch_array($rsdw)) {
        $sql_sto = 'SELECT * FROM ptstockpo_db.stock_tb WHERE Stk_ProdID = "'.$rowdw['List_ProdID'].'"';
        $rssto = mysql_query($sql_sto);
        $rw = mysql_fetch_array($rssto);
        if($rw != 0){
            $sql_usk = 'UPDATE ptstockpo_db.stock_tb SET StkTotalNow = StkTotalNow + "'.$rowdw['ListTotal'].'" , StkEditTime = NOW() , StkEditUser = "'.$_SESSION['ssUserName'].'" WHERE Stk_ProdID = "'.$rowdw['List_ProdID'].'" ';
            $rs = mysql_query($sql_usk) or die(mysql_error());
        
            $sql_usk2 = 'INSERT INTO ptstockpo_db.instock_tb (IskID, Isk_ProdID, Isk_PoID, IskTotal, IskDetail, IskDateTime, IskInTime, IskInUser, IskEditTime, IskEditUser) VALUES (NULL,"'.$rowdw['List_ProdID'].'","'.$_POST['fpo'].'","'.$rowdw['ListTotal'].'","'.$rowdw['PoDetail'].'",NOW(),NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
            $rs2 = mysql_query($sql_usk2) or die(mysql_error());

        }else{
            $sql_usk = 'INSERT INTO ptstockpo_db.stock_tb (StkID, Stk_ProdID, StkTotal, StkTotalNow, StkUnit, StkAddTime, StkAddUser, StkEditTime, StkEditUser) VALUES (NULL , "'.$rowdw['List_ProdID'].'" ,"'.$rowdw['ListTotal'].'" , "'.$rowdw['ListTotal'].'" , "'.$rowdw['ListUnit'].'" , NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'"  )';
            $rs = mysql_query($sql_usk) or die(mysql_error());
        
            $sql_usk2 = 'INSERT INTO ptstockpo_db.instock_tb (IskID, Isk_ProdID, Isk_PoID, IskTotal, IskDetail, IskDateTime, IskInTime, IskInUser, IskEditTime, IskEditUser) VALUES (NULL,"'.$rowdw['List_ProdID'].'","'.$_POST['fpo'].'","'.$rowdw['ListTotal'].'","'.$rowdw['PoDetail'].'",NOW(),NOW(),"'.$_SESSION['ssUserName'].'",NOW(),"'.$_SESSION['ssUserName'].'") ';
            $rs2 = mysql_query($sql_usk2) or die(mysql_error());

        }

    }
    //----------------------------------------------------------------------------------------
    
    
    echo "Y";
}
?>