<?php session_start(); 
include '../js/conn.php';

$sql_pf = 'SELECT * FROM user_tb WHERE UserID = "'.$_SESSION['ssUserID'].'" ';
$rspf = mysql_query($sql_pf) or die(mysql_error());
?>
<div data-parsley-validate class="form-horizontal form-label-left">
<?php while ($rowpf = mysql_fetch_array($rspf)) { ?>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">รหัสพนักงาน </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text"  id="codee" class="form-control" value="<?php echo $rowpf['UserCode']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passu">คำนำหน้าชื่อ</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <?php $sql_ti = 'SELECT * FROM title_tb Order by TitleName ';
            $rsti = mysql_query($sql_ti) or die(mysql_error()); ?>
            <select class=" form-control" id="titlee">
                <?php while($rowti = mysql_fetch_array($rsti)) { ?>
                <option value="<?php echo $rowti['TitleID']; ?>" <?php if($rowti['TitleID'] == $rowpf['UserTitle'] ){ echo "selected"; } ?> ><?php echo $rowti['TitleName']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passu">ชื่อ</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text"  id="fnamee" class="form-control" value="<?php echo $rowpf['UserFname']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passu">นามสกุล</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text"  id="lnamee" class="form-control" value="<?php echo $rowpf['UserLname']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="namefu" class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อผู้ใช้</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text"  id="usere" class="form-control" value="<?php echo $rowpf['UserName']; ?>">
        </div>
    </div> 
    <div class="form-group">
        <label for="statusu" class="control-label col-md-3 col-sm-3 col-xs-12">สาขา</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <?php $sql_brah = 'SELECT * FROM branch_tb Order by BrahCode ';
            $rsbrah = mysql_query($sql_brah) or die(mysql_error()); ?>
            <select class=" form-control" id="brahe">
                <?php while($rowbrh = mysql_fetch_array($rsbrah)) { ?>
                <option value="<?php echo $rowbrh['BrahCode']; ?>" <?php if($rowbrh['BrahCode'] == $rowpf['UserBrah'] ){ echo "selected"; } ?> ><?php echo $rowbrh['BrahCode'],'/',$rowbrh['BrahName']; ?></option>
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
                <?php while($rowdep = mysql_fetch_array($rsdep)) { ?>
                <option value="<?php echo $rowdep['DepID']; ?>" <?php if($rowdep['DepID'] == $rowpf['UserDep'] ){ echo "selected"; } ?> ><?php echo $rowdep['DepName']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div> 
<? } ?>
</div>