<?php session_start();
include '../js/conn.php';

$sql_se = 'SELECT * FROM supply_tb WHERE SupID = "'.$_POST['id'].'" ';
$rsse = mysql_query($sql_se) or die(mysql_error());
?>
<div class="form-horizontal form-label-left">
<?php while($row = mysql_fetch_array($rsse)) { ?>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">Supplier Name </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="supn" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row['SupName']; ?>">
    </div>
  </div>
<?php } ?>
</div>