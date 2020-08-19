<?php session_start();
include '../js/conn.php';
?>
<!--//////////////////////////////////////////////////////////////////////////////////////-->
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passu">หมวดอุปกรณ์</label>
  <?php 
    if($_POST['id1'] == 606){
      $id = "1";
    }elseif($_POST['id1'] == 607 ){
      $id = "2";
    }
  ?>

  <?php $sql_g = 'SELECT * FROM groupeq_tb WHERE GeqCate = "'.$id.'" ';
        $Objg = mysql_query($sql_g) or die(mysql_error());?>

  <div class="col-md-6 col-sm-6 col-xs-12">

    <select id="grouppro" class="selectpicker" data-live-search="true"  hidden onchange="javascript:neprl3();" >
      <option value="">-- -- - หมวดอุปกรณ์ - -- --</option>
    <?php while ($row = mysql_fetch_array($Objg)) { ?>
      <option value="<?php echo $row['GeqCode']; ?>"><?php echo $row['GeqName']; ?></option>
    <?php } ?>
    </select>
  </div>
</div>
  <div id="nprol3"></div>
<script>

$("#nprol3").load("product/new_productl3.php");

function neprl3() {
  var id2 = $("#grouppro").val();
  var id12 = "<?php echo $id ?>";
  $("#nprol3").load("product/new_productl3.php",{ id2 : id2,id12 : id12 });
}
$(function () {
  $('.selectpicker').selectpicker({
        style: 'btn-default',
        size: 10
    });
});
</script>