<?php include '../js/conn.php'; 

function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
body {
  background: rgb(204,204,204); 
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  background-image: url("../images/oppt.jpg");
  background-size: 21cm 29.7cm;
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
@media print {
  body, page {
    margin: 0;
  }
}
.number1{
    position: absolute;
    padding-top: 175px;
    padding-left: 60px;

}
.number{
    position: absolute;
    padding-top: 175px;
    padding-left: 680px;

}
.supply{
    position: absolute;
    padding-top: 240px;
    padding-left: 78px;

}
.date{
    position: absolute;
    padding-top: 150px;
    padding-left: 450px;

}
.adderd{
    position: absolute;
    padding-top: 280px;
    padding-left: 78px;

}
.order{
    position: absolute;
    padding-top: 280px;
    padding-left: 520px;

}
.tb{
    position: absolute;
    padding-top: 355px;
}
.code{
    width : 40px;
    padding-left: 30px;
    height : 22px;
}
.product{
    width : 350px;
}
.total{
    width : 60px;
}
.priu{
    width : 110px;
}
.disc{
    width : 100px;
}
.ptotal{
    width : 60px;
}
.detail{
    position: absolute;
    padding-top: 193px;
    padding-left: 55px;
}
.dis{
    position: absolute;
    padding-top: 818px;
    padding-left: 690px;
}
.pall{
    position: absolute;
    padding-top: 795px;
    padding-left: 670px;
}
.pvat{
    position: absolute;
    padding-top: 820px;
    padding-left: 670px;
}
.pto{
    position: absolute;
    padding-top: 845px;
    padding-left: 670px;
}
.name{
    position: absolute;
    padding-top: 885px;
    padding-left: 90px;
}
.named{
    position: absolute;
    padding-top: 885px;
    padding-left: 90px;
}
.name2{
    position: absolute;
    padding-top: 885px;
    padding-left: 540px;
}
.name2d{
    position: absolute;
    padding-top: 885px;
    padding-left: 540px;
}
.name2d1{
    position: absolute;
    padding-top: 980px;
    padding-left: 340px;
}
.date1{
    position: absolute;
    padding-top: 930px;
    padding-left: 90px;
}
.date1d{
    position: absolute;
    padding-top: 930px;
    padding-left: 540px;
}
.date1d1{
    position: absolute;
    padding-top: 1025px;
    padding-left: 340px;
}

@media all
{
    .page-break { display:none; }
    .page-break-no{ display:none; }
}

@media print
{
	
    .page-break { /* ขึ้นหน้าใหม่ แบบหน้า ถัดไป */ 
		display:block;
		height:1px; 
		page-break-before:always; 
	}
    .page-break-no{ /* ขึ้นหน้าใหม่ แบบหน้า หน้าแรก */
	 	display:block;
		height:1px; 
		page-break-after:avoid; 
    } 
}
</style>
</head>
<?php $sql = 'SELECT * FROM po_tb,supply_tb,user_tb WHERE Po_UserID = UserID and Po_SupID = SupID and PoID = "'.$_GET['id'].'" ';
    $rs = mysql_query($sql) or die(mysql_error());
?>
<body>
<div class=Section1> 
</div>
<page size="A4">
<?php while ($row = mysql_fetch_array($rs)) { ?>
<div class="number1"><?php echo $row['PoBook']; ?></div>
<div class="number"><?php echo $row['PoBook'],$row['PoNumber']; ?></div>
<div class="supply"><?php echo $row['SupName']; ?></div>
<div class="date"><?php echo DateThai($row['PoDate']); ?></div>
<?php $sql1 = 'SELECT * FROM list_tb,product_tb WHERE List_PoID = "'.$row['PoID'].'" and List_ProdID = ProdID ';
    $rs1 = mysql_query($sql1) or die(mysql_error()); ?>
    <table>
        <tbody  class="tb">
        <?php while ($row1 = mysql_fetch_array($rs1)) { ?>
            <tr>
                <td class="code" ><?php echo ++$i; ?></td>
                <td class="product" ><?php echo $row1['ProdName']; ?></td>
                <td class="total" ><?php echo $row1['ListTotal']; ?></td>
                <td class="total" ><?php echo $row1['ListUnit']; ?></td>
                <td class="priu" ><?php echo number_format($row1['ListPrice'],2); ?></td>
                <td class="ptotal" ><?php echo number_format($row1['ListPriceTotal'],2); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<div class="detail"><?php echo wordwrap($row['PoDetail'],67,"<br>",true); ?></div>
<div class="pall"><?php echo number_format($row['PoPriceAll']+$dis,2); ?></div>
<div class="pvat"><?php echo number_format($row['PoVat'],2); ?></div>
<div class="pto"><?php echo number_format($row['PoPriceTotal'],2); ?></div>
<?php if( $row['PoPriceTotal'] >= 5000 ) { ?>
<div class="name"><?php echo $row['UserFname'],' ',$row['UserLname']; ?></div>
<div class="date1"><?php echo DateThai($row['PoDate']); ?></div>
<div class="name2"><?php echo $row['PoApproveUser']; ?></div>
<?php if($row['PoApproveDate'] != ''){ ?>
<div class="date1d"><?php echo DateThai($row['PoApproveDate']); ?></div>
<?php } ?>
<?php }else{ ?>
<div class="named"><?php echo $row['UserFname'],' ',$row['UserLname']; ?></div>
<div class="date1"><?php echo DateThai($row['PoDate']); ?></div>
<div class="name2d"><?php echo $row['PoApproveUser']; ?></div>
<div class="date1d"><?php echo DateThai($row['PoApproveDate']); ?></div>
<div class="name2d1"><?php echo $row['PoApproveUser']; ?></div>
<div class="date1d1"><?php echo DateThai($row['PoApproveDate']); ?></div>
<?php } ?>
<?php } ?>
</page>
</body>
</html>