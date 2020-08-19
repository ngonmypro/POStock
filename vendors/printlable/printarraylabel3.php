
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>HTML & CSS Avery Labels</title>
    <link href="labels.css" rel="stylesheet" type="text/css" >
<style>
    body {
        width: 21.7cm; /*8.5in;*/
        /*margin: 0;/*0in .1875in;*/
		/*text-align:center;
		margin-left: 2cm;*/
		color:#000000;
		/*background: rgb(204,204,204);*/
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
		
    .label{
        /* Avery 5160 labels -- CSS and HTML by MM at Boulder Information Services */
        width: 8.5cm; /*  2.025in;  plus .6 inches from padding */
        height: 5.8cm; /* .875in; plus .125 inches from padding */
        padding: .125in .3in 0;
        margin-right: .125in; /* the gutter */
		
		background-image:url(img-01.jpg);
		background-repeat:no-repeat;
		background-size: 10cm 6cm;
		/*width: 100%;
		height:5.8cm;*/
		
        float: left;

        text-align: center;
        overflow: hidden;

        outline: 1px dotted; /* outline doesn't occupy space like border does */
        }

	.page-break { /* ขึ้นหน้าใหม่ แบบหน้า ถัดไป */ 
		display:block;
		height:5px; 
		page-break-before:always; 
	 }
     .page-break-no{ /* ขึ้นหน้าใหม่ แบบหน้า หน้าแรก */
	 	display:block;
		height:5px; 
		page-break-after:avoid; 
	 } 
	 
	.bar_print {
    	/*font: 2mm arial;*/
    	text-align: right;
    	padding-right: 1.645833333mm;
    	margin-top: 42.995833333mm;
    	/*height: 2mm;*/
	}
	
	@media all
	{
    	.page-break { display:none; }
    	.page-break-no{ display:none; }
	}
	@media print{
	  input{
		  display:none;
	  }	
	  @page { /* จัดการเกี่ยวกับหน้ากระดาษ */
			  /*margin: 0;*/ 
			  size: 21.4cm 29.7cm;
			  /*size: portrait;
			  size: landscape;
			  */
			  margin-bottom: 2mm;
			  margin-top: 2mm;
			  margin-left: 10mm;
			  margin-right: 0.5mm;
			  text-align:center;
			  background: white;
	  }
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
<body>
<div style="text-align:center;"><input type="button" name="button" id="button" value="Print" onclick="print();"></div>
<?
	$numall = 55;
	$p_size=10; //กำหนดจำนวน Record ที่จะแสดงผลต่อ 1 เพจ 
	$total_page=ceil($numall/$p_size); 
?>
<? 
	if($numall >= 10){ 
		$start = 1; 
		$end = 10; 
	}else{
		$start = 1; 
		$end = $numall;	
	}
?>
<? for($p=1;$p<=$total_page;$p++) { ?>
<div class="page-break<?=($p==1)?"-no":""?>">&nbsp;</div>
<!--<page size="A4">-->
<?php for($i=$start;$i<=$end;$i++){ ?>
<div class="label">
		<div class="bar_print">
        <img src="https://boulderinformationservices.files.wordpress.com/2011/08/barcode_sample.png" width="108" height="43" />
    	<!--<br>Human readable-->
        </div>
</div>
<?php } ?>
<!--</page> -->
<?
	
	$numall =  $numall - 10; 
	if($numall >= 10){
		$start = $start + 10; 
		$end = $end + 10; 
	}else{
		$start = $end + 1; 
		$end = $end + $numall;
	}
?>

<? } ?>



</body>
</html>