<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Untitled Document</title>
<style>
@media screen , print {
	
body {
    /*margin: 0;*/
	margin: 0.1cm;
    /*border: 0.264583333mm solid green;*/
	color:#000000;
	background: rgb(204,204,204); 
}

page[size="A4"] { /* กำหนด style กระดาษบนหน้า webpage */
  background: white;
  width: 21.4cm;
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

.table_style {
    width: 100%;
}

.table_style td {
    text-align: left;
    padding: 0 0 3.175mm 5.291666667mm;
}

.space {
    height: 2.645833333mm;
}

.div_print {
    width: 83mm; /*63mm;*/
    height: 57mm;/*37.735416667mm;*/
    margin-top: 3.735416667mm;
	margin-left: 3.735416667mm;
    border-width: 1px;
    border-style: solid;
    border-color: red;
	text-align:center;
	background-color:#FF6;
	/*background: url(%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B9%83%E0%B8%AB%E0%B8%A1%E0%B9%88-01.jpg);*/
}
}
.part_dec_print {
    font: 3mm arial;
    text-align: left;
    padding-left: 1.5875mm;
    height: 8.5mm;
}
.p_tag {
    height: 100%;
    vertical-align: middle;
    padding-top: 1.5875mm;
}

.qty_span {
    padding-top: 1.5875mm;
}
.part_print {
    font: 6.5mm arial;
    height: 6.5mm;
    text-align: left;
    padding-left: 1.5875mm;
}
.bar_print {
    padding-left: 3.96875mm
}
.qty_print {
    font: 6.5mm arial;
    text-align: center;
    height: 6.5mm;
}
.date_print {
    font: 2mm arial;
    text-align: right;
    padding-right: 4.645833333mm;
    margin-top: 4.995833333mm;
    height: 2mm;
}

}

@media print{
  input{
	  display:none;
  }	
  @page { /* จัดการเกี่ยวกับหน้ากระดาษ */
		  margin: 0;
		  size: 21.4cm 29.7cm;
		  margin-bottom: 0;
		  margin-top: 0;
		  margin-left: 0.1cm;
		  margin-right: 0.1cm;
		  background: white;
  }
}

</style>
</head>

<body>

<html>
<head>

</head>
<body cz-shortcut-listen="true">
<div style="text-align:center;"><input type="button" name="button" id="button" value="Print" onclick="print();"></div>
<page size="A4">
<div class="div_print">
    <div class="part_dec_print">
        <div class="p_tag">REAR FABRIC SCVR</div>
    </div>
    <div class="part_print">PZQ22-12100</div>
    <div class="bar_print">
        <img alt="testing" src="220px-UPC-A-036000291452.png" width="180" height="95">
        <!--<img alt="test" src="แบบใหม่-01.jpg" width="200px" height="200px">-->
    </div>
    <div class="qty_print">1</div>
    <div class="date_print">23A4</div>
</div>
</page>

</body>
</html>