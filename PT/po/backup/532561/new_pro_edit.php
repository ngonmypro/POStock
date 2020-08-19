<?php include '../js/conn.php'; 
if(!isset($_POST['id2'])){ 
?>
<div class="form-horizontal form-label-left" >
    <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">Product </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <select class="selectpicker" id="edpoduct" data-live-search="true">
        <?php $sql = 'SELECT * FROM product_tb';
            $rs = mysql_query($sql) or die(mysql_error()); ?>
            <option value="">-- --- Product --- --</option>
            <?php while($row = mysql_fetch_array($rs)){ ?>
            <option value="<?php echo $row['ProdID']; ?>"><?php echo $row['ProdName']; ?></option>  
            <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">จำนวน </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="number" id="numeee"  class="form-control col-md-7 col-xs-12" onKeyUp="ekeyup1();">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">หน่วย </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="cunitee" class="form-control col-md-7 col-xs-12" value="Pcs.">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">ราคา </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="number" id="prieee"  class="form-control col-md-7 col-xs-12" onKeyUp="ekeyup1();">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">ส่วนลด </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="number" id="diseee"  class="form-control col-md-7 col-xs-12" value="0" onKeyUp="ekeyup1();">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">รวม </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="number" id="totaleee" class="form-control col-md-7 col-xs-12" onKeyUp="ekeyup1();" readonly>
    </div>
  </div>

</div>
<?php }else{ ?>
  <div class="form-horizontal form-label-left" >
<?php $sqls = 'SELECT * FROM list_tb WHERE ListID = "'.$_POST['id2'].'" '; 
      $rss = mysql_query($sqls) or die(mysql_error()); 
      while($rows = mysql_fetch_array($rss)){ 
      ?>
    <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">Product </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <select class="selectpicker" id="edpoduct" data-live-search="true">
        <?php $sql = 'SELECT * FROM product_tb';
            $rs = mysql_query($sql) or die(mysql_error()); ?>
            <option value="">-- --- Product --- --</option>
            <?php while($row = mysql_fetch_array($rs)){ ?>
            <option value="<?php echo $row['ProdID']; ?>" <?php if($row['ProdID'] == $rows['List_ProdID']) { echo "selected"; } ?> ><?php echo $row['ProdName']; ?></option>  
            <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">จำนวน </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="number" id="numeee"  class="form-control col-md-7 col-xs-12" onKeyUp="ekeyup1();" value="<?php echo $rows['ListTotal'] ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">หน่วย </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="cunitee" class="form-control col-md-7 col-xs-12" value="<?php echo $rows['ListUnit']; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">ราคา </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="number" id="prieee"  class="form-control col-md-7 col-xs-12" onKeyUp="ekeyup1();" value="<?php echo $rows['ListPrice'] ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">ส่วนลด </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="number" id="diseee"  class="form-control col-md-7 col-xs-12" value="0" onKeyUp="ekeyup1();" value="<?php echo $rows['ListDiscount'] ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">รวม </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="number" id="totaleee" class="form-control col-md-7 col-xs-12" onKeyUp="ekeyup1();" readonly value="<?php echo $rows['ListPriceTotal'] ?>">
    </div>
  </div>
  <?php } ?>
</div>
<?php } ?>
<script>
  $('.selectpicker').selectpicker({
        style: 'btn-default',
        size: 10
    });

   function ekeyup1() {
       var numeee = $("#numeee").val();
       var prieee = $("#prieee").val();
       var diseee = $("#diseee").val();
       //alert(numeee + '/' + prieee + '/' + diseee)
       if(numeee != '' && prieee != ''){
           sum1 = numeee * prieee;
           sum2 = sum1 - diseee;
           $("#totaleee").val(sum2);
       }
   } 
</script>
