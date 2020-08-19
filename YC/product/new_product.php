<?php session_start(); 
include '../js/conn.php';?>

<div data-parsley-validate class="form-horizontal form-label-left">

<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">กลุ่มสินค้า</label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <select id="grppro" class="form-control" onchange="javascript:neprl2();">
        <option value="">-- -- - ทรัพย์สิ้น - -- --</option>
        <option value="606">สินทรัพย์</option>
        <option value="607">สิ้นเปลือง</option>
    </select>
  </div>
</div>
<div id="nprol2" ></div>
 <!--//////////////////////////////////////////////////////////////////////////////////////-->
 <div class="form-group">
  <label for="statusu" class="control-label col-md-3 col-sm-3 col-xs-12">ซื้อสินค้า</label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="nameprd" class="form-control col-md-7 col-xs-12" type="text">
  </div>
 </div> 
</div>
<script>
$("#nprol2").load("product/new_productl2.php");
function neprl2() {
  var id1 = $("#grppro").val();
  $("#nprol2").load("product/new_productl2.php",{ id1 : id1 });
}
</script>