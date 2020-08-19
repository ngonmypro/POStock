<?php session_start(); 
include '../js/conn.php';?>
<div class="page-title">
    <div class="title_left">
     <h3>Purchase Order Approve <small>การอนุมัติการสังซื้อ</small></h3>
         </div>
    </div>
<div class="row">
 <div class="col-md-12">
    <div class="x_panel">
     <div class="x_title">
        <ul class="nav nav-tabs bar_tabs">
                    <?php $sql = 'SELECT count(PoID) as num FROM po_tb WHERE  PoStatus = 1';
                        $rs = mysql_query($sql) or die(mysql_fetch_array()); 
                        $rw = mysql_fetch_array($rs);
                        $sql2 = 'SELECT count(PoID) as num2 FROM po_tb WHERE  PoStatus = 2';
                        $rs2 = mysql_query($sql2) or die(mysql_fetch_array()); 
                        $rw2 = mysql_fetch_array($rs2);?>
                        

                    <li role="presentation" class="active" id="bt1" ><a href="javascript:chka1();"> <span class="badge" style="color : #ffffff;"><?php echo $rw['num']; ?></span> รออนุมัติ</a></li>
                    <li role="presentation" id="bt2" ><a href="javascript:chka2();"> <span class="badge" style="color : #ffffff;"><?php echo $rw2['num2']; ?></span> อนุมัติแล้ว</a></li>
                </ul>
       <div class="clearfix"></div>
     </div>
     <div class="x_content">
        <div id="tbapv" ></div>
     </div>
</div>
</div>
</div>
<script>
$("#tbapv").load("approve/approve_table.php");

function chka1() {
    $('#bt2').removeAttr('class');
    $('#bt1').attr("class","active");
    $("#tbapv").load("approve/approve_table.php");
}
function chka2() {
    $('#bt1').removeAttr('class');
    $('#bt2').attr("class","active");
    $("#tbapv").load("approve/approve_table2.php");
}
</script>