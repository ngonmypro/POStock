<?php session_start(); 
include '../js/conn.php';?>
<div class="page-title">
    <div class="title_left">
        <h3>Stock Beg <small>รายการขอเบิก</small></h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>รายการเบิก</h2>
                <div class="clearfix"></div>
            </div>
        <div class="x_content">
            <table class="table table-striped table-bordered" id="hisstock">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>รหัสขอเบิก</th>
                        <th>ผู้ขอเบิก</th>
                        <th>สาขา</th>
                        <th>แผนก</th>
                        <th>วันที่</th>
                        <th>สถานะ</th>
                        <th></th>
                    </tr>
                </thead>
                <?php $sql_btb = 'SELECT * FROM mainbeg_tb,user_tb,branch_tb,dep_tb WHERE Mbeg_UserbID = UserID and UserBrah = BrahCode and UserDep = DepID';
                    $rsbtb = mysql_query($sql_btb) or die(mysql_error());  ?>
                <tbody>
                    <?php while ($rowbtb = mysql_fetch_array($rsbtb)) { ?>
                    <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php echo $rowbtb['MbegCode']; ?></td>  
                        <td><?php echo $rowbtb['UserFname'],' ',$rowbtb['UserLname']; ?></td>  
                        <td><?php echo $rowbtb['BrahName']; ?></td>  
                        <td><?php echo $rowbtb['DepName']; ?></td>  
                        <td><?php echo $rowbtb['MbegDate']; ?></td>
                        <td><?php if($rowbtb['MbegStatus'] == 0){
                                echo "<span class='label label-warning' >ยังไม่อนุมัติ </span>";
                            }elseif($rowbtb['MbegStatus'] == 1){
                                echo "<span class='label label-success' >อนุมัติแล้ว </span>";
                            }elseif ($rowbtb['MbegStatus'] == 3) {
                                echo "ไม่อนุมัติ";
                            } ?>
                        </td>
                        <td>
                        <button type="button" class="btn btn-xs btn-primary" onclick="javascript:viewbeg(<?=$rowbtb['MbegID']?>);"> <span class="fa fa-eye"></span> view</button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$("#hisstock").DataTable({
    "lengthMenu": [[20, 40, 60, -1], [20, 40, 60, "All"]]
});
</script>