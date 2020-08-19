<?php session_start(); 
include '../js/conn.php';?>

<div data-parsley-validate class="form-horizontal form-label-left">
<?php $sql_epr = 'SELECT * FROM product_tb WHERE ProdID = "'.$_POST['id'].'"';
      $objepr = mysql_query($sql_epr) or die (mysql_error());
      while ($row = mysql_fetch_array($objepr)) { 
        
        $val = $row['ProdName'];?>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">กลุ่มสินค้า</label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <select id="grpproe" class="form-control" onchange="javascript:epl2();">
        <option value="606" <?php if($row['Prod_GuoPro'] == 606){ echo "selected"; } ?>>สินทรัพย์</option>
        <option value="607" <?php if($row['Prod_GuoPro'] == 607){ echo "selected"; } ?>>สิ้นเปลือง</option>
    </select>
  </div>
</div>
<div id="edprol2" ></div>
 <div class="form-group">
  <label for="statusu" class="control-label col-md-3 col-sm-3 col-xs-12">ซื้อสินค้า</label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="nameprde" class="form-control col-md-7 col-xs-12" type="text" value='<?=$val?>'>
  </div>
 </div> 

 <?php $id=$row['Prod_GuoPro'];  
  $idg =$row['Prod_Group'];
  $idt = $row['Prod_Type'];
  $ide = $row['Prod_Brand'];
} ?>
</div>
<script>
var id = "<?php echo $id ?>";
var idg = "<?php echo $idg ?>";
var idt = "<?php echo $idt ?>";
var ide = <?php echo $ide ?>;
 $("#edprol2").load("product/edit_productl2.php",{ id : id , idg : idg , idt : idt , ide : ide});

 function epl2() {
   var id = $("#grpproe").val();
   var idp = "<?php echo $_POST['id'] ?>";
  $("#edprol2").load("product/edit_productl2.php",{ id : id });
 }
</script>