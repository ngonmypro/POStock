<?php session_start();
include '../js/conn.php';
?>
<div  class="form-horizontal form-label-left">
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">Username </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="useru" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passu">Password</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="password" id="passu" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">รหัสพนักงาน </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="codeu" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passu">คำนำหน้าชื่อ</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <?php $sql_ti = 'SELECT * FROM title_tb Order by TitleName ';
          $rsti = mysql_query($sql_ti) or die(mysql_error()); ?>
      <select class=" form-control" id="titleu">
          <option value="">-- --- คำนำหน้าชื่อ --- --</option>
        <?php while($rowti = mysql_fetch_array($rsti)) { ?>
          <option value="<?php echo $rowti['TitleID']; ?>" ><?php echo $rowti['TitleName']; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="namefu" class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อ</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input id="fnameu" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
    </div>
  </div> 
  <div class="form-group">
    <label for="namelu" class="control-label col-md-3 col-sm-3 col-xs-12">นามสกุล</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input id="lnameu" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
    </div>
  </div> 
  <div class="form-group">
    <label for="statusu" class="control-label col-md-3 col-sm-3 col-xs-12">สาขา</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <?php $sql_brah = 'SELECT * FROM branch_tb Order by BrahCode ';
        $rsbrah = mysql_query($sql_brah) or die(mysql_error()); ?>
      <select class=" form-control" id="brahu">
        <option value=""  >-- --- สาขา --- --</option>
      <?php while($rowbrh = mysql_fetch_array($rsbrah)) { ?>
        <option value="<?php echo $rowbrh['BrahCode']; ?>"><?php echo $rowbrh['BrahCode'],'/',$rowbrh['BrahName']; ?></option>
      <?php } ?>
      </select>
    </div>
  </div>     
  <div class="form-group">
    <label for="statusu" class="control-label col-md-3 col-sm-3 col-xs-12">แผนก</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <?php $sql_dep = 'SELECT * FROM dep_tb Order by DepName ';
        $rsdep = mysql_query($sql_dep) or die(mysql_error()); ?>
      <select class=" form-control" id="depe">
        <option value=""  >-- --- แผนก --- --</option>
        <?php while($rowdep = mysql_fetch_array($rsdep)) { ?>
        <option value="<?php echo $rowdep['DepID']; ?>"  ><?php echo $rowdep['DepName']; ?></option>
        <?php } ?>
      </select>
    </div>
  </div> 
  <div class="form-group">
    <label for="statusu" class="control-label col-md-3 col-sm-3 col-xs-12">Status User</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <select class="form-control" id="statusu">
        <option value="0">Admin</option>
        <option value="1">user</option>
      </select>
    </div>
  </div> 
</div>