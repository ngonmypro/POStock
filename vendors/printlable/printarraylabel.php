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
    .page-break  {
        clear: left;
        display:block;
        page-break-after:always;
        }
    </style>

</head>
<body>
<?php for($i=1;$i<=300;$i++){ ?>
<div class="label">
	<img src="https://boulderinformationservices.files.wordpress.com/2011/08/barcode_sample.png" />
    <br>Human readable
</div>
<?php } ?>
<div class="page-break"></div>


</body>
</html>