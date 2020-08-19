<?php session_start();
include '../js/conn.php';
?>
<!--//////////////////////////////////////////////////////////////////////////////////////-->
<div class="form-group">
  <label for="namefu" class="control-label col-md-3 col-sm-3 col-xs-12">ประเภทอุปกรณ์</label>
  <?php $sql_g2 = 'SELECT * FROM typeeq_tb WHERE Teq_GeqID = "'.$_POST['id2'].'" and TeqCate = "'.$_POST['id12'].'" ';
        $Objg2 = mysql_query($sql_g2) or die(mysql_error());?>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <select id="tyeq" class="selectpicker" data-live-search="true"  hidden onchange="javascript:neprl4();" >
      <option value="">-- -- - ประเภทอุปกรณ์ - -- --</option>
    <?php while ($row2 = mysql_fetch_array($Objg2)) { ?>
      <option value="<?php echo $row2['TeqID']; ?>" ><?php echo $row2['TeqName']; ?></option>
    <?php } ?>
    </select>
  </div>
 </div> 
 <div id="nprol4" ></div>
 <script>

$("#nprol4").load("product/new_productl4.php");

function neprl4() {
  var id3 = $("#tyeq").val();
  var id123 = "<?php echo $_POST['id2']; ?>";
  var id23 = "<?php echo $_POST['id12']; ?>";
  $("#nprol4").load("product/new_productl4.php",{ id3 : id3,id23 : id23,id123:id123 });
}

  $('.selectpicker').selectpicker({
        style: 'btn-default',
        size: 10
    });
 </script>