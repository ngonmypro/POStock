<?php session_start(); 
include '../js/conn.php';
?>
<div class="page-title">
    <div class="title_left">
        <h3>Stock Export <small>ขอเบิก</small></h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="clearfix"></div>
            </div>
        <div class="x_content">
        <center><h4>New Export Stock <small>ขอเบิก</small></h4></center>
        <div class="form-horizontal form-label-left">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passu">คำนำหน้าชื่อ</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <?php $sql_ti = 'SELECT * FROM title_tb Order by TitleName ';
                     $rsti = mysql_query($sql_ti) or die(mysql_error()); ?>
                    <select class=" form-control" id="titlebeg">
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
                    <input id="fnameubeg" list="user" class="form-control col-md-7 col-xs-12" type="text">
                    <?php $sql_ub = 'SELECT * FROM user_tb Order by UserFname';
                        $rsub = mysql_query($sql_ub) or die(mysql_error()); ?>
                    <datalist id="user" class="form-control">
                    <?php while ($rowu = mysql_fetch_array($rsub)) { ?>
                        <option value="<?php echo $rowu['UserFname']; ?>">
                        <?php  } ?>
                    </datalist>
                </div>
            </div> 
            <div class="form-group">
                <label for="namelu" class="control-label col-md-3 col-sm-3 col-xs-12">นามสกุล</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="lnameubeg" list="luser" class="form-control col-md-7 col-xs-12" type="text" >
                    <?php $sql_ub = 'SELECT * FROM user_tb Order by UserLname';
                        $rsub = mysql_query($sql_ub) or die(mysql_error()); ?>
                    <datalist id="luser" class="form-control">
                    <?php while ($rowu = mysql_fetch_array($rsub)) { ?>
                        <option value="<?php echo $rowu['UserLname']; ?>">
                        <?php  } ?>
                    </datalist>
                </div>
            </div> 
            <div class="form-group">
                <label for="statusu" class="control-label col-md-3 col-sm-3 col-xs-12">สาขา</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <?php $sql_brah = 'SELECT * FROM branch_tb Order by BrahCode ';
                        $rsbrah = mysql_query($sql_brah) or die(mysql_error()); ?>
                    <select class=" form-control" id="brahubeg">
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
                    <select class=" form-control" id="depebeg">
                        <option value=""  >-- --- แผนก --- --</option>
                        <?php while($rowdep = mysql_fetch_array($rsdep)) { ?>
                        <option value="<?php echo $rowdep['DepID']; ?>"  ><?php echo $rowdep['DepName']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div> 
        </div>
        <hr>
            <div class="row">
                <div class="col-md-4">
                    <button type="button" class="btn btn-info btn-xs" onclick="javascript:addlistbeg();">+ เพิ่มรายการ</button>
                    <button type="button" class="btn btn-danger btn-xs" onclick="javascript:relistbeg();">- ลบรายการ</button>
                </div>
                <div class="col-md-1 col-md-offset-7">
                    <button type="button" class=" btn btn-primary" onclick="javascript:savebtn(i3);"> <span class="fa fa fa-save"></span> บันทึก</button>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th>ลำดับ</th>
                    <th style="width: 50%">รายการ</th>
                    <th>จำนวน</th>
                    <th>หมายเหตุ</th>
                    </tr>
                </thead>
                <tbody id="potb3">
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
var i3 = 1 ;
function addlistbeg() {
  var al = "<tr id='r2"+ i3 +"'>";
  al +=  "<td id='ln2'>"+ i3 +"</td>";
  <?php $sql_pl='SELECT * FROM product_tb ';
        $rspl = mysql_query($sql_pl) or die(mysql_error());?>
  al += '<td  style="width: 50%"><select class="selectpicker" id="item3'+i3+'" data-live-search="true"  hidden>';
  al += '<option value="">-</option>'
        <?php while ($rowpl = mysql_fetch_array($rspl)) { ?>
  al += '<option value="<?php echo $rowpl['ProdID'];?>" data-tokens="<?php echo $rowpl['ProdName'];?>"><?php echo $rowpl['ProdName'];?></option>'
        <?php } ?>
  al += '</select>'
  al += '</td>'
  al += '<td style="width: 15%"><input type="number" class="form-control" id="numb3'+i3+'" onKeyUp="keyup('+i3+');"></td>';
  al += '<td><input type="text" class="form-control" id="detail3'+i3+'" onKeyUp="keyup('+i3+');"></td>';
  al += "</tr>";
  $("#potb3").append(al);
  i3+=1;
  $('.selectpicker').selectpicker({
        style: 'btn-default',
        size: 10
    });
}

function relistbeg() {
  if(i3 == 1){
    Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
    {
      msg: "ห้ามลบ"
    });
  }else{
    $("#r2"+i3).remove();
    i3-=1;
  }
}
</script>