<html>
<head>
  <style>
  @media screen
  {
     p.special {font-family:Verdana,sans-serif; font-size:12px}
  }
  @media print
  {
     p.special {font-family:Arial, Helvetica; font-size:50px;
         text-decoration:line-through}
     input{
    	display:none;
	 }			 
  }
  @media screen,print
  {
     p.special {font-weight:bold}
  }
  </style>
</head>

<body>
  <p class="special">Day Jakkrit</p>
  <div style="text-align:center;"><input type="button" name="button" id="button" value="Print" onclick="print();"></div>

</body>
</html>  