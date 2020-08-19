<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>HTML & CSS Avery Labels (5160) by MM at Boulder Information Services</title>
    <link href="labels.css" rel="stylesheet" type="text/css" >
<style>
    body {
        width: 8.5in;
        margin: 0in .1875in;
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
        width: 2.025in; /* plus .6 inches from padding */
        height: .875in; /* plus .125 inches from padding */
        padding: .125in .3in 0;
        margin-right: .125in; /* the gutter */

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
			  /*margin: 0; */
			  size: 21.4cm 29.7cm;
			  /*size: portrait;
			  size: landscape;
			  */
			  margin-bottom: 0.5mm;
			  margin-top: 0.5mm;
			  margin-left: 0.5mm;
			  margin-right: 0.5mm;
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

<?php for($i=1;$i<=100;$i++){ ?>

<div class="label">
		<img src="https://boulderinformationservices.files.wordpress.com/2011/08/barcode_sample.png" />
    	<br>Human readable
</div>

<?php } ?>
<!--<div class="page-break<?($i==39)?"-no":""?>">&nbsp;</div>-->
<!--<div class="page-break"></div>-->

</body>
</html>