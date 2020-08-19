<?php session_start(); 
include '../js/conn.php';?>
<div class="page-title">
    <div class="title_left">
     <h3>Product List <small>รายการสินค้า</small></h3>
         </div>
    </div>
<div class="row">
 <div class="col-md-12">
    <div class="x_panel">
     <div class="x_title">
        <h2>รายการสินค้า</h2>
        <div class="col-md-2">
        <select class="form-control" id="pd" onchange="javascript:prod()">
            <option value="">-- --- ทรัพย์สิ้น --- --</option>
            <option value="606">สินทรัพย์</option>
            <option value="607">สิ้นเปลือง</option>
        </select>
        </div>
       <div class="clearfix"></div>
     </div>
     <div class="x_content">
        <div id="prodtable"></div>
     </div>
</div>
</div>
</div>
<script>
    $(function () {
        $("#prodtable").load("product/product_table.php");
    });

    function prod() {
        var iddp = $("#pd").val();
        $("#prodtable").load("product/product_table.php",{ pdl : iddp  });
    }
</script>