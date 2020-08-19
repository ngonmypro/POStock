<?php session_start();
include '../js/conn.php';
?>
<center><h4>Adjust | <small><?php echo $_POST['name']; ?></small></h4></center>
<hr>
<div class="form-horizontal form-label-left">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">Edit Total </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="nestk" class="form-control col-md-7 col-xs-12" >
        </div>
    </div>
</div>