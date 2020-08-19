<?php session_start();
include '../js/conn.php';
?>
<center><h4>Adjust | <small><?php echo $_POST['name']; ?></small></h4></center>
<hr>
<button type="button" class="btn btn-primary" onclick="javascript:adjusted(<?=$_POST['id']?>,'<?=$_POST['name']?>');" ><span class="fa fa-pencil" ></span> แก้ไขจำนวน</button>
    <div id="adtbl" ></div>
<script>
var id = "<?php echo $_POST['id']; ?>";
$("#adtbl").load('adjust/adjust_table.php',{ id : id });
$(function() {
      $("#adjst").DataTable();
    });
</script>