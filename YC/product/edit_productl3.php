<?php session_start();
include '../js/conn.php';
?>
<!--//////////////////////////////////////////////////////////////////////////////////////-->
<div class="form-group">
  <label for="namefu" class="control-label col-md-3 col-sm-3 col-xs-12">ประเภทอุปกรณ์</label>
  <?php $sql_g2 = 'SELECT * FROM typeeq_tb WHERE Teq_GeqID = "'.$_POST['idg'].'" and TeqCate = "'.$_POST['idc'].'" ';
        $Objg2 = mysql_query($sql_g2) or die(mysql_error());?>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <select id="tyeqe" class="selectpicker" data-live-search="true" onchange="javascript:epl4();">
    <?php while ($row2 = mysql_fetch_array($Objg2)) { ?>
        <option value="<?php echo $row2['TeqID']; ?>" <?php if($_POST['idt'] == $row2['TeqID']){ echo "selected"; } ?>><?php echo $row2['TeqName']; ?></option>
    <?php } ?>
    </select>
  </div>
 </div> 
 <div id="edprol4"></div>

<script>
  var idg = "<?php echo $_POST['idg']?>";
  var idc = "<?php echo $_POST['idc']?>";
  var idt = "<?php echo $_POST['idt'] ?>";
  var ide = <?php echo $_POST['ide'] ?>;
$("#edprol4").load("product/edit_productl4.php",{ idg : idg , idc : idc , idt : idt , ide : ide});

function epl4() {
    var idt = $("#tyeqe").val();
    var idc = "<?php echo $_POST['idc']?>";
    var idg = "<?php echo $_POST['idg']?>";
    $("#edprol4").load("product/edit_productl4.php",{ idt : idt , idc : idc , idg : idg});
}

   $('.selectpicker').selectpicker({
        style: 'btn-default',
        size: 10
    });
</script>