<?php session_start();
include '../js/conn.php';
?>
  <!--//////////////////////////////////////////////////////////////////////////////////////-->

<?php
    $sql_v = 'SELECT * FROM typeeq_tb WHERE TeqID = "'.$_POST['idt'].'"';
    $rsv = mysql_query($sql_v) or die(mysql_error());
    $row = mysql_fetch_array($rsv);
  ?>
  <div class="form-group">
  <label for="namelu" class="control-label col-md-3 col-sm-3 col-xs-12">ยี่ห่อสินค้า</label>
  <?php $sql_g3 = 'SELECT * FROM equip_tb WHERE Equip_GeqCode = "'.$_POST['idg'].'" and Equip_TeqCode = "'.$row['TeqCode'].'"  and EquipCate = "'.$_POST['idc'].'"';
        $Objg3 = mysql_query($sql_g3) or die(mysql_error());?>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <select id="brane" class="selectpicker" data-live-search="true">
    <?php while ($row3 = mysql_fetch_array($Objg3)) { ?>
        <option value="<?php echo $row3['EquipID']; ?>" <?php if($dq == $row3['EquipID']){ echo "selected"; } ?> ><?php echo $row3['EquipName']; ?></option>
    <?php } ?>
    </select>
  </div>
 </div> 
 <!--//////////////////////////////////////////////////////////////////////////////////////-->

 <script>
   $('.selectpicker').selectpicker({
        style: 'btn-default',
        size: 10
    });
 </script>