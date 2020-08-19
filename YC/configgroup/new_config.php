<?php session_start();
include '../js/conn.php';
?>
<?php if($_POST['chk'] == 'G'){ ?>
    <div  class="form-horizontal form-label-left">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">ประเภททรัพย์สิน </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" id="ngr" onchange="javascript:confgrr()">
                <option value="1">สินทรัพย์</option>
                <option value="2">สิ้นเปลือง</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">Name </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="ngrn" required="required" class="form-control col-md-7 col-xs-12" >
        </div>
    </div>
</div>
<?php }elseif($_POST['chk'] == 'T'){ ?>
    <div  class="form-horizontal form-label-left">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">Name </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="nty" required="required" class="form-control col-md-7 col-xs-12" >
        </div>
    </div>
</div>
<?php }elseif($_POST['chk'] == 'E'){ ?>
    <div  class="form-horizontal form-label-left">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">Name </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="neq" required="required" class="form-control col-md-7 col-xs-12" >
        </div>
    </div>
</div>
<?php } ?>