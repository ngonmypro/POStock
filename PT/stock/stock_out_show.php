<?php session_start(); 
include '../js/conn.php';?>
<div class="page-title">
    <div class="title_left">
        <h3>Stock Export <small>รออนุมัติ</small></h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="clearfix"></div>
            </div>
        <div class="x_content">
        <ul class="nav nav-tabs bar_tabs" role="tablist">
                    <?php $sql = 'SELECT count(MbegID) as num FROM mainbeg_tb WHERE  MbegStatus = 0';
                        $rs = mysql_query($sql) or die(mysql_fetch_array()); 
                        $rw = mysql_fetch_array($rs);
                        $sql2 = 'SELECT count(MbegID) as num2 FROM mainbeg_tb WHERE  MbegStatus = 1';
                        $rs2 = mysql_query($sql2) or die(mysql_fetch_array()); 
                        $rw2 = mysql_fetch_array($rs2);?>
                        

                    <li role="presentation" class="active" id="bt1" ><a href="javascript:chka1();"> <span class="badge" style="color : #ffffff;"><?php echo $rw['num']; ?></span> รออนุมัติเบิก</a></li>
                    <li role="presentation" id="bt2" ><a href="javascript:chka2();"> <span class="badge" style="color : #ffffff;"><?php echo $rw2['num2']; ?></span> อนุมัติแล้ว</a></li>
                </ul>
            <div id="stotb" ></div>
        </div>
    </div>
</div>
<script>
$("#stotb").load('stock/stock_out_table.php');

function chka1() {
    $('#bt3').removeAttr('class');
    $('#bt2').removeAttr('class');
    $('#bt1').attr("class","active");
    $("#stotb").load('stock/stock_out_table.php');
}
function chka2() {
    $('#bt3').removeAttr('class');
    $('#bt1').removeAttr('class');
    $('#bt2').attr("class","active");
    $("#stotb").load('stock/stock_out_table2.php');
}
</script>