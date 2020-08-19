<?php session_start();
include '../js/conn.php';
?>
...
<div data-parsley-validate class="form-horizontal form-label-left">
<?php 
  $sql_uef = 'SELECT * FROM user_tb WHERE UserID = "'.$_POST['id'].'" ';
  $resultuef = mysql_query($sql_uef) OR die(mysql_error());
  while ($rowuef = mysql_fetch_array($resultuef)) {
?>
   <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">รหัสพนักงาน </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text"  id="codeee" class="form-control" value="<?php echo $rowuef['UserCode']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passu">คำนำหน้าชื่อ</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <?php $sql_title = 'SELECT * FROM title_tb ';
            $rstitle = mysql_query($sql_title) or die(mysql_error()); ?>
            <select class=" form-control" id="titlee">
                <?php while($rowtitle = mysql_fetch_array($rstitle)) { ?>
                <option value="<?php echo $rowtitle['TitleID']; ?>" <?php if($rowtitle['TitleID'] == $rowuef['UserTitle'] ){ echo "selected"; } ?> ><?php echo $rowtitle['TitleName']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passu">ชื่อ</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text"  id="fnameee" class="form-control" value="<?php echo $rowuef['UserFname']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passu">นามสกุล</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text"  id="lnameee" class="form-control" value="<?php echo $rowuef['UserLname']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="namefu" class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อผู้ใช้</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text"  id="useree" class="form-control" value="<?php echo $rowuef['UserName']; ?>">
        </div>
    </div> 
    <div class="form-group">
        <label for="namefu" class="control-label col-md-3 col-sm-3 col-xs-12">รหัสผ่าน</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="password"  id="passee" class="form-control" value="<?php echo $rowuef['UserPass']; ?>">
        </div>
    </div> 
    <div class="form-group">
        <label for="statusu" class="control-label col-md-3 col-sm-3 col-xs-12">สาขา</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <?php $sql_brah = 'SELECT * FROM branch_tb Order by BrahCode ';
            $rsbrah = mysql_query($sql_brah) or die(mysql_error()); ?>
            <select class=" form-control" id="brahee">
                <?php while($rowbrh = mysql_fetch_array($rsbrah)) { ?>
                <option value="<?php echo $rowbrh['BrahCode']; ?>" <?php if($rowbrh['BrahCode'] == $rowuef['UserBrah'] ){ echo "selected"; } ?> ><?php echo $rowbrh['BrahCode'],'/',$rowbrh['BrahName']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>     
    <div class="form-group">
        <label for="statusu" class="control-label col-md-3 col-sm-3 col-xs-12">แผนก</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <?php $sql_dep = 'SELECT * FROM dep_tb Order by DepName ';
            $rsdep = mysql_query($sql_dep) or die(mysql_error()); ?>
            <select class=" form-control" id="depee">
                <?php while($rowdep = mysql_fetch_array($rsdep)) { ?>
                <option value="<?php echo $rowdep['DepID']; ?>" <?php if($rowdep['DepID'] == $rowuef['UserDep'] ){ echo "selected"; } ?> ><?php echo $rowdep['DepName']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div> 
 <div class="form-group">
  <label for="statusue" class="control-label col-md-3 col-sm-3 col-xs-12">Status User</label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <select class="form-control" id="statusue">
        <option value="0" <?php if($rowuef['UserStatus'] == 0){ echo "selected";}?>>Admin</option>
        <option value="1"  <?php if($rowuef['UserStatus'] == 1){ echo "selected";}?>>user</option>
    </select>
  </div>
 </div> 
 <?php  } ?>
</div>