<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Untitled Document</title>
<style>
@mediar print{
	@page narrow { size: 9cm 18cm }
	@page rotated { size: landscape }
	div { page: narrow }
	table { page: rotated }	
	@page 
    {
	size:auto;  /* กำหนดขนาดของหน้าเอกสารเป็นออโต้ครับ */
        margin:0 0 0 0mm;  /* กำหนดขอบกระดาษเป็น 0 มม. */
		font-size:30px;
    }

    body 
    {
	size:auto;
    margin:0 0 0 0px;  /* เป็นการกำหนดขอบกระดาษของเนื้อหาที่จะพิมพ์ก่อนที่จะส่งไปให้เครื่องพิมพ์ครับ */
	font-size:30px;
    }
}
</style>
</head>

<body>
<div>
<table>...</table>
<table>...</table>
<p>This text is rendered on a 'narrow' page</p>
<div style="text-align:center;"><input type="button" name="button" id="button" value="Print" onclick="print();"></div>
</div>
</body>
</html>