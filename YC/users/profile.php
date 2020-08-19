<?php session_start(); 
include '../js/conn.php';

$sql_pf = 'SELECT * FROM user_tb,dep_tb,branch_tb,title_tb ';
if(!isset($_POST['id'])){
 $sql_pf.= ' WHERE UserID = "'.$_SESSION['ssUserID'].'" and UserBrah = BrahCode and UserDep = DepID and UserTitle = TitleID'; 
}else{
 $sql_pf.= ' WHERE UserID = "'.$_POST['id'].'" and UserBrah = BrahCode and UserDep = DepID and UserTitle = TitleID'; 
}
$rspf = mysql_query($sql_pf) or die(mysql_error());
?>
<div data-parsley-validate class="form-horizontal form-label-left">
<?php while ($rowpf = mysql_fetch_array($rspf)) { ?>
    <?php if(!isset($_POST['id'])){ ?>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">รหัสพนักงาน </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <h5><?php echo $rowpf['UserCode']; ?></h5>
        </div>
    </div>
    <?php } ?>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passu">ชื่อ</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
           <h5><?php echo $rowpf['TitleName'],$rowpf['UserFname'],' ',$rowpf['UserLname']; ?></h5> 
        </div>
    </div>
    <?php if(!isset($_POST['id'])){ ?>
    <div class="form-group">
        <label for="namefu" class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อผู้ใช้</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <h5><?php echo $rowpf['UserName']; ?></h5>  
        </div>
    </div> 
    <div class="form-group">
        <label for="namelu" class="control-label col-md-3 col-sm-3 col-xs-12">รหัสผ่าน</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
           <h5><button type="button" class="btn btn-xs btn-default" onclick="javascript:edpass();" >เปลียนรหัสผ่าน</button></h5> 
        </div>
    </div> 
    <?php } ?>
    <div class="form-group">
        <label for="statusu" class="control-label col-md-3 col-sm-3 col-xs-12">สาขา</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
           <h5><?php echo $rowpf['BrahCode'],'/',$rowpf['BrahName']; ?></h5> 
        </div>
    </div>     
    <div class="form-group">
        <label for="statusu" class="control-label col-md-3 col-sm-3 col-xs-12">แผนก</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
           <h5><?php echo $rowpf['DepName']; ?></h5> 
        </div>
    </div> 
<? } ?>
</div>