<?php
 $connhost = "localhost";
 $connuser = "root";
 $connpass = "30323";
 $connDB = "ycstock_db";
$connDB2 = "postock_db";

 $c=mysql_connect($connhost,$connuser,$connpass); //เชื่อมตอ
	mysql_select_db($connDB,$c); //เลือกติดต่อกับฐานข้อมูลที่กำหนด
	mysql_query("set names utf8"); //เชื่อมต่อไปเป็นภาษาไทย
 	if(!$c){
		echo"<h3>Can't connect database!</h3>";
		exit();
	}

	$c2=mysql_connect($connhost,$connuser,$connpass); //เชื่อมตอ
	mysql_select_db($connDB2,$c2); //เลือกติดต่อกับฐานข้อมูลที่กำหนด
	mysql_query("set names utf8"); //เชื่อมต่อไปเป็นภาษาไทย
 	if(!$c2){
		echo"<h3>Can't connect database!</h3>";
		exit();
	}
?>