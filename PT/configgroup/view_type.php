<?php session_start();
include '../js/conn.php';
?>
<div class="page-title">
        <div class="title_left">
            <h3>Type List <small><?php echo $_POST['name']; ?></small></h3>
            <button type="button" class="btn btn-primary" onclick="javascript:addconfig('T',<?=$_POST['id'] ?>,<?=$_POST['id2'] ?>)"> + เพื่มรายการ</button>
        </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>รายการ</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id="typetable"></div>
            </div>
        </div>
    </div>
</div>
<script>
var name = "<?php echo $_POST['name']; ?>";
$("#typetable").load("configgroup/view_type_table.php",{ id : <?php echo $_POST['id']?>, id2 : <?php echo $_POST['id2'] ?>, name : name });
</script>