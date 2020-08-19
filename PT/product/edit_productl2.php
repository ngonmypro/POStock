<?php session_start(); 
include '../js/conn.php';?>
<!--//////////////////////////////////////////////////////////////////////////////////////-->
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passu">หมวดอุปกรณ์</label>
  <?php if($_POST['id'] == 606){
            $id = "1";
        }else{
            $id = "2";
        }
        $sql_g = 'SELECT * FROM groupeq_tb WHERE GeqCate = "'.$id.'" ';
        $Objg = mysql_query($sql_g) or die(mysql_error());
        ?>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <select id="groupproe" class="selectpicker" data-live-search="true" onchange="javascript:epl3();">
    <?php while ($row1 = mysql_fetch_array($Objg)) { ?>
        <option value="<?php echo $row1['GeqCode']; ?>" <?php if($_POST['idg'] == $row1['GeqCode']){ echo "selected"; } ?>><?php echo $row1['GeqName']; ?></option>
    <?php } ?>
    </select>
  </div>
</div>

<div id="edprol3" ></div>


<script>
    var idg = "<?php echo $_POST['idg']?>";
    var idc = "<?php echo $id ?>";
    var idt = "<?php echo $_POST['idt'] ?>";
    var ide = <?php echo $_POST['ide'] ?>;
$("#edprol3").load("product/edit_productl3.php",{ idg : idg , idc : idc , idt : idt , ide : ide});

function epl3() {
    var idg = $("#groupproe").val();
    var idc = "<?php echo $id?>";
    var idt = "<?php echo $_POST['idt'] ?>";
    $("#edprol3").load("product/edit_productl3.php",{ idg : idg , idc : idc , idt : idt});
}

   $('.selectpicker').selectpicker({
        style: 'btn-default',
        size: 10
    });
</script>
