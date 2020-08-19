<?php include '../js/conn.php'; 
include '../js/numconstr.php';
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
  background-image: url("../images/Form PO YH-11.jpg");
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
.brashmt{
    position: absolute;
    padding-top: 62px;
    padding-left: 10px;

}
.brash1{
    position: absolute;
    padding-top: 78px;
    padding-left: 10px;

}
.brash2{
    position: absolute;
    padding-top: 94px;
    padding-left: 10px;

}
.brash3{
    position: absolute;
    padding-top: 109px;
    padding-left: 10px;

}
.number1{
    position: absolute;
    padding-top: 150px;
    padding-left: 520px;

}
.number{
    position: absolute;
    padding-top: 185px;
    padding-left: 520px;

}
.supply{
    position: absolute;
    padding-top: 185px;
    padding-left: 78px;

}
.date{
    position: absolute;
    padding-top: 150px;
    padding-left: 650px;

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
    padding-top: 420px;
}
.code{
    width : 60px;
    padding-left: 20px;
}
.product{
    width : 365px;
}
.total{
    width : 45px;
    padding-left: 15px;
}
.priu{
    width : 80px;
}
.disc{
    width : 80px;
}
.ptotal{
    width : 60px;
}
.detail{
    position: absolute;
    padding-top: 840px;
    padding-left: 15px;
    width : 500px;
}
.dis{
    position: absolute;
    padding-top: 818px;
    padding-left: 690px;
}
.pall{
    position: absolute;
    padding-top: 852px;
    padding-left: 690px;
}
.pvat{
    position: absolute;
    padding-top: 885px;
    padding-left: 690px;
}
.pstrto{
    position: absolute;
    padding-top: 920px;
    padding-left: 10px;
}
.pto{
    position: absolute;
    padding-top: 920px;
    padding-left: 690px;
}
.name{
    position: absolute;
    padding-top: 1000px;
    padding-left: 50px;
}
.named{
    position: absolute;
    padding-top: 1000px;
    padding-left: 140px;
}
.name2{
    position: absolute;
    padding-top: 1000px;
    padding-left: 220px;
}
.name2d{
    position: absolute;
    padding-top: 1000px;
    padding-left: 540px;
}
.date1{
    position: absolute;
    padding-top: 1040px;
    padding-left: 150px;
}
.date1d{
    position: absolute;
    padding-top: 1040px;
    padding-left: 540px;
}
.fontsize{
    font-size: 15px;
}
.cuser{
    position: absolute;
    padding-top: 1000px;
    padding-left: 420px;
}
</style>
</head>
<?php $sql = 'SELECT * FROM po_tb,supply_tb,user_tb,apprname_tb WHERE ApprID = PoApprName and Po_UserID = UserID and Po_SupID = SupID and PoID = "'.$_GET['id'].'" ';
    $rs = mysql_query($sql) or die(mysql_error());
?>
<body>
<div class=Section1> 
</div>
<page size="A4">
<?php while ($row = mysql_fetch_array($rs)) { ?>
<?php if($row['Po_BrahID'] == 1) { ?>
<div class="brashmt" >&#10004;</div>
<?php }elseif($row['Po_BrahID'] == 2) {?>
<div class="brash1" >&#10004;</span></div>
<?php }elseif($row['Po_BrahID'] == 3) {?>
<div class="brash2" >&#10004;</span></div>
<?php }elseif($row['Po_BrahID'] == 4) {?>
<div class="brash3" >&#10004;</span></div>
<?php } ?>
<div class="number1"><?php echo $row['PoBook']; ?></div>
<div class="number"><?php echo $row['PoBook'],$row['PoNumber']; ?></div>
<div class="supply"><?php echo $row['SupName']; ?></div>
<div class="date"><?php echo DateThai($row['PoDate']); ?></div>
<div class="adderd">บริษัท ยงเฮ้าส์ จำกัด (สำนักงานใหญ่) <br><br> 88  หมู่ 9 ต.ปากแพรก อ.เมือง จ.กาญจนบุรี 71000</div>
<div class="order"><?php echo $row['UserFname']; ?></div>
<?php $sql1 = 'SELECT * FROM list_tb,product_tb WHERE List_PoID = "'.$row['PoID'].'" and List_ProdID = ProdID ';
    $rs1 = mysql_query($sql1) or die(mysql_error()); ?>
    <table>
        <tbody  class="tb">
        <?php while ($row1 = mysql_fetch_array($rs1)) { ?>
            <tr>
                <td class="code fontsize" ><?php echo ++$i;?></td>
                <td class="product fontsize"><?php echo wordwrap($row1['ListDetail'],35,"\n",true); ?></td>
                <td class="total fontsize" ><?php echo $row1['ListTotal']; ?></td>
                <td class="priu fontsize" ><?php echo number_format($row1['ListPrice'],2); ?></td>
                <td class="disc fontsize" ><?php echo number_format($row1['ListDiscount'],2); ?></td>
                <td class="ptotal fontsize" ><?php echo number_format($row1['ListPriceTotal'],2); ?></td>
            </tr>
            <?php $dis += $row1['ListDiscount']; ?>
        <?php } ?>
        </tbody>
    </table>
<div class="detail"><?php echo $row['PoDetail']; ?></div>
<div class="dis"><?php echo number_format($dis,2); ?></div>
<div class="pall"><?php echo number_format($row['PoPriceNvat'],2); ?></div>
<div class="pvat"><?php echo number_format($row['PoVat'],2); ?></div>
<div class="pstrto"><?php echo convert($row['PoPriceTotal']); ?></div>
<div class="pto"><?php echo number_format($row['PoPriceTotal'],2); ?></div>
<?php if( $row['PoPriceTotal'] >= 3000 ) { ?>
<div class="name"><?php echo $row['UserFname'],' ',$row['UserLname']; ?></div>
<div class="name2"><?php echo $row['PoApproveUser']; ?></div>
<div class="date1"><?php echo DateThai($row['PoDate']); ?></div>
<div class="cuser"><?php echo $row['ApprName'];?></div>
<?php }else{ ?>
<div class="named"><?php echo $row['UserFname'],' ',$row['UserLname']; ?></div>
<div class="date1"><?php echo DateThai($row['PoDate']); ?></div>
<div class="name2d"><?php echo $row['PoApproveUser']; ?></div>
<?php if($row['PoApproveDate'] != '') { ?>
<div class="date1d"><?php echo DateThai($row['PoApproveDate']); ?></div>
<?php } ?>
<?php } ?>
<?php } ?>
</page>
</body>
</html>