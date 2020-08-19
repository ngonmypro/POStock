<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>css print report table continue</title>
<style type="text/css">
* {
    margin:0;
    padding:0;
    font-family:Arial, "times New Roman", tahoma;
    font-size:12px;
}
html {
    font-family:Arial, "times New Roman", tahoma;
    font-size:12px;
    color:#000000;
}
body {
    font-family:Arial, "times New Roman", tahoma;
    font-size:12px;
    padding:0;
    margin:0;
    color:#000000;
	background: rgb(204,204,204); 
}

page[size="A4"] { /* กำหนด style กระดาษบนหน้า webpage */
  background: white;
  width: 21cm;
  height: 29.7cm;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
  padding-left:0.5cm;
}

page[size="A2"] {
  background: white;
  width: 21cm;
  height: 16cm;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
  padding-left:0.5cm;
}

.headTitle {
    font-size:12px;
    font-weight:bold;
    text-transform:uppercase;
}
.headerTitle01 {
    border:1px solid #333333;
    border-left:2px solid #000;
    border-bottom-width:2px;
    border-top-width:2px;
    font-size:11px;
}
.headerTitle01_r {
    border:1px solid #333333;
    border-left:2px solid #000;
    border-right:2px solid #000;
    border-bottom-width:2px;
    border-top-width:2px;
    font-size:11px;
}
/* สำหรับช่องกรอกข้อมูล  */
.box_data1 {
    font-family:Arial, "times New Roman", tahoma;
    height:18px;
    border:0px dotted #333333;
    border-bottom-width:1px;
}
/* กำหนดเส้นบรรทัดซ้าย  และด้านล่าง */
.left_bottom {
    border-left:2px solid #000;
    border-bottom:1px solid #000;
}
/* กำหนดเส้นบรรทัดซ้าย ขวา และด้านล่าง */
.left_right_bottom {
    border-left:2px solid #000;
    border-bottom:1px solid #000;
    border-right:2px solid #000;
}
/* สร้างช่องสี่เหลี่ยมสำหรับเช็คเลือก */
.chk_box {
    display:block;
    width:10px;
    height:10px;
    overflow:hidden;
    border:1px solid #000;
}
/* สร้างปุ่มพิมพ์ */
.btn_print {
	text-align:center;
	width:2cm;
	height:1cm;
}
/* css ส่วนสำหรับการแบ่งหน้าข้อมูลสำหรับการพิมพ์ */
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
	
	@page { /* จัดการเกี่ยวกับหน้ากระดาษ */
		/*margin: 0; */
		size: 21cm 15cm;
		margin-bottom: 0;
		margin-top: 0;
		background: white;
	}
	
	input{ /* ไม่แสดงปุ่ม print */
    	display:none;
	}		
	
}
</style>
</head>
 
<body>
<div style="text-align:center"><input class="btn_print" type="button" name="button" id="button" value="Print" onClick="print();"></div>
<?php for($i=1;$i<=5;$i++){ ?>
<div class="page-break<?=($i==1)?"-no":""?>">&nbsp;</div>
<page size="A2">
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left">Page <?=$i?></td>
  </tr>
  <tr>
    <td align="center" class="headTitle" style="font-size:15px;">ใบรับฝากรวม<br />
      RECEIPT FOR BULK POSTING <br /></td>
  </tr>
  <tr>
    <td align="left"><table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td>&nbsp;</td>
          <td align="center"><div class="chk_box"></div></td>
          <td align="left">ไปรษณียภัณฑ์</td>
          <td align="center"><div class="chk_box"></div></td>
          <td align="left">ลงทะเบียน</td>
          <td align="center"><div class="chk_box"></div></td>
          <td align="left">รับรอง</td>
        </tr>
        <tr>
          <td>ได้รับฝาก</td>
          <td align="center">&nbsp;</td>
          <td align="left">Letter-Post items</td>
          <td align="center">&nbsp;</td>
          <td align="left">Registered</td>
          <td>&nbsp;</td>
          <td align="left">Certified</td>
        </tr>
        <tr>
          <td>Received</td>
          <td align="center"><div class="chk_box"></div></td>
          <td align="left">พัสดุไปรษณีย์</td>
          <td align="center"><div class="chk_box"></div></td>
          <td align="left">รับประกัน</td>
          <td>&nbsp;</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center">&nbsp;</td>
          <td align="left">Parcels</td>
          <td align="center">&nbsp;</td>
          <td align="left">Insured</td>
          <td>&nbsp;</td>
          <td align="left">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr>
          <td>&nbsp;</td>
          <td width="200" align="center"> ไว้ดังนี้ ตราประจำวัน</td>
        </tr>
        <tr>
          <td>จาก
            <input name="textfield" type="text" class="box_data1" id="textfield" style="text-align:left;width:500px;"   /></td>
          <td align="center">As Follows Date Stamp</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="left">From</td>
  </tr>
  <tr>
    <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-top:5px double #000;">
        <tr>
          <td width="50" rowspan="2" class="headerTitle01"  align="center" valign="middle">ลำดับ<br />
            No.</td>
          <td width="200" rowspan="2" class="headerTitle01"    align="center" valign="middle">นามผู้รับ<br />
            Name Of Addressee</td>
          <td width="130" rowspan="2" class="headerTitle01"    align="center" valign="middle">ปลายทาง<br />
            Destination</td>
          <td width="70" rowspan="2" class="headerTitle01"   align="center" valign="middle">เลขที่<br />
            Number</td>
          <td width="100" rowspan="2" class="headerTitle01"    align="center" valign="middle">น้ำหนัก (กรัม)<br />
            Weight (Grammes)</td>
          <td colspan="2" class="headerTitle01"    align="center" valign="bottom">ค่าบริการ<br />
            Postal Charge</td>
          <td width="100" rowspan="2" class="headerTitle01_r"   align="center" valign="middle">หมายเหตุ<br />
            Remarks</td>
        </tr>
        <tr>
          <td width="70"   align="center" valign="bottom" class="headerTitle01">บาท<br />
            Baht</td>
          <td width="30" class="headerTitle01"   align="center" valign="bottom">สต.
            Stg.</td>
        </tr>
        <tr>
          <td height="20" align="center" class="left_bottom">1</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_right_bottom">&nbsp;</td>
        </tr>
        <tr>
          <td height="20" align="center" class="left_bottom">2</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_right_bottom">&nbsp;</td>
        </tr>
        <tr>
          <td height="20" align="center" class="left_bottom">3</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_right_bottom">&nbsp;</td>
        </tr>
        <tr>
          <td height="20" align="center" class="left_bottom">4</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_right_bottom">&nbsp;</td>
        </tr>
        <tr>
          <td height="20" align="center" class="left_bottom">5</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_right_bottom">&nbsp;</td>
        </tr>
        <tr>
          <td height="20" align="center" class="left_bottom">6</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_right_bottom">&nbsp;</td>
        </tr>
        <tr>
          <td height="20" align="center" class="left_bottom">7</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_right_bottom">&nbsp;</td>
        </tr>
        <tr>
          <td height="20" align="center" class="left_bottom">8</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_right_bottom">&nbsp;</td>
        </tr>
        <tr>
          <td height="20" align="center" class="left_bottom">9</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_right_bottom">&nbsp;</td>
        </tr>
        <tr>
          <td height="20" align="center" class="left_bottom">10</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_right_bottom">&nbsp;</td>
        </tr>
        <tr>
          <td height="20" align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_bottom">&nbsp;</td>
          <td align="left" class="left_right_bottom">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4" align="left" style="border-top:2px solid #000;">รวมทั้งสิ้น 
            Total
            <input name="textfield2" type="text" class="box_data1" id="textfield2" style="text-align:center;width:250px;"   />
            ฉบับ/ห่อ
            Pieces</td>
          <td align="center" style="border-top:2px solid #000;">เป็นเงิน 
            Amount</td>
          <td height="20" align="left" class="left_bottom" style="border-bottom:5px double #000;border-top:2px solid #000;">&nbsp;</td>
          <td align="left" class="left_right_bottom" style="border-bottom:5px double #000;border-top:2px solid #000;">&nbsp;</td>
          <td align="left" style="border-top:2px solid #000;">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="50%" align="left">- ใบรับฝากนี้ใช้เป็นหลักฐานการฝากส่ง โปรดเก็บรักษาไว้จนหมดอายุ<br />
            การสอบสวน คือ ระยะเวลา 6 เดือน นับจากวันต่อจากวันที่ฝากส่ง<br /></td>
          <td width="50%" align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left">- การติดต่อในเรื่องใดเกี่ยวกับการฝากส่ง ต้องนำใบฝากฉบับนี้<br />
            มาแสดงทุกครั้ง มิฉะนั้น ปณท อาจไม่ทำการตรวจสอบหรือสอบสวนให้</td>
          <td align="left"><table width="300" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="100" align="right">พนักงานรับฝาก</td>
                <td width="62%"><input name="textfield10" type="text" class="box_data1" id="textfield10" style="text-align:center;width:200px;"   /></td>
              </tr>
              <tr>
                <td align="right">Counter Clerk</td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</page>
<?php } ?>
</body>
</html>