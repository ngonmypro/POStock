<?php session_start();
include '../js/conn.php';
?>
<div  class="form-horizontal form-label-left">
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">ไฟล์ </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="file" id="fileup" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12"> </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <button type="button" class="btn btn-default" onclick="javascript:updoc(<?=$_POST['id']?>);"><span class="fa fa-file"></span> Upload</button>
    </div>
  </div>
</div>
<div id="table_upload"></div>
<script>
$("#table_upload").load("po/upload_table.php",{ id : <?php echo $_POST['id']; ?> })
</script>