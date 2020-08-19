<?php include '../js/conn.php';?>
<center><h4>ADD TO STOCK <small>From Purchase Order</small></h4></center>
<?php $sql_isp = 'SELECT * FROM po_tb WHERE PoImStock = 0 and PoStatus = 2';
        $rsisp = mysql_query($sql_isp) or die(mysql_error());?>
<select class="selectpicker col-md-12" id="fpo" onchange="javascript:tbf();" data-live-search="true">
    <option value="">-- --- ---- --- เลือก PO --- ---- --- --</option>
    <?php while ($rowisp = mysql_fetch_array($rsisp)) { ?>
    <option value="<?php echo  $rowisp['PoID'];?>"><?php echo 'PO',$rowisp['PoBook'],$rowisp['PoNumber'],'_วันที่',$rowisp['PoDate'],'_ราคา',$rowisp['PoPriceTotal'];?></option>
    <?php } ?>
</select>
<div id="tbst" ></div>

<button type="button" class="btn btn-primary" onclick="javacript:inpost();" >Add Stock</button>

<script>
$("#tbst").load("stock/add_stock_po_table.php");

function tbf() {
    var id = $("#fpo").val();
    $("#tbst").load("stock/add_stock_po_table.php",{ id : id });
}

$('.selectpicker').selectpicker({
  style: 'btn-default',
  size: 10
});

</script>