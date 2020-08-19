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
    padding-top: 178px;
    padding-left: 70px;
		font-size: 11px;
}
.number{
    position: absolute;
    padding-top: 178px;
    padding-left: 688px;
		font-size: 11px;
}
.supply{
    position: absolute;
    padding-top: 244px;
    padding-left: 70px;
		font-size: 11px;
}
.date{
    position: absolute;
    padding-top: 155px;
    padding-left: 430px;
		font-size: 11px;
}
.tb{
    position: absolute;
    padding-top: 354px;
    line-height: 18pt;

}
.code{
    width : 30px;
    padding-left: 32px;
}
.product{
    width : 355px;
}
.unit{
    width : 72px;
    padding-left: 15px;
}
.total{
    width : 48px;
}
.priu{
    width : 110px;
}
.ptotal{
    width : 60px;
}
.detail{
    position: absolute;
    padding-top: 195px;
    padding-left: 60px;
    width : 800px;
		font-size: 11px;
}
.pall{
    position: absolute;
    padding-top: 797;
    padding-left: 684px;
		font-size: 12px;
}
.pvat{
    position: absolute;
    padding-top: 822px;
    padding-left: 684px;
		font-size: 12px;
}
.pto{
    position: absolute;
    padding-top: 845px;
    padding-left: 684px;
		font-size: 12px;
}
.name{
    position: absolute;
    padding-top: 885px;
    padding-left: 115px;
		font-size: 12px;
}
.named{
    position: absolute;
    padding-top: 885px;
    padding-left: 115px;
		font-size: 12px;
}
.name2{
    position: absolute;
    padding-top: 995px;
    padding-left: 220px;
		font-size: 11px;
}
.name2d{
    position: absolute;
    padding-top: 995px;
    padding-left: 540px;
		font-size: 11px;
}
.date1{
    position: absolute;
    padding-top: 933px;
    padding-left: 115px;
		font-size: 12px;
}
.date1d{
    position: absolute;
    padding-top: 1045px;
    padding-left: 540px;
}
.fontsize{
    font-size: 12px;
}
.cuser{
    position: absolute;
    padding-top: 982px;
    padding-left: 322px;
		font-size: 12px;
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
                <td class="code fontsize" ><?php echo ++$i;?></td>
                <td class="product fontsize"><?php echo wordwrap($row1['ListDetail'],35,"\n",true); ?></td>
                <td class="total fontsize" ><?php echo $row1['ListTotal']; ?></td>
                <td class="unit"><?php echo $row1['ListUnit']; ?></td>
                <td class="priu fontsize" ><?php echo number_format($row1['ListPrice'],2); ?></td>
                <td class="ptotal fontsize" ><?php echo number_format($row1['ListPriceTotal'],2); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<div class="detail"><?php echo $row['PoDetail']; ?></div>
<div class="pall"><?php echo number_format($row['PoPriceNvat'],2); ?></div>
<div class="pvat"><?php echo number_format($row['PoVat'],2); ?></div>
<div class="pto"><?php echo number_format($row['PoPriceTotal'],2); ?></div>
<?php if( $row['PoPriceTotal'] >= 5001 ) { ?>
<div class="name"><?php echo $row['UserFname'],' ',$row['UserLname']; ?></div>
<div class="name2"><?php echo $row['PoApproveUser']; ?></div>
<div class="date1"><?php echo DateThai($row['PoDate']); ?></div>
<div class="cuser"><?php# echo $row['ApprName'];?></div>
<?php }else{ ?>
<div class="named"><?php echo $row['UserFname'],' ',$row['UserLname']; ?></div>
<div class="date1"><?php echo DateThai($row['PoDate']); ?></div>
<div class="name2d"><?php echo $row['PoApproveUser']; ?></div>
<div class="date1d"><?php# echo DateThai($row['PoApproveDate']); ?></div>
<?php } ?>
<?php } ?>
</page>
</body>
</html>
