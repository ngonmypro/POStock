<?php session_start();
include '../js/conn.php';
?>
<table class="table table-striped table-bordered" id="begstock">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>รหัสขอเบิก</th>
            <th>ผู้ขอเบิก</th>
            <th>สาขา</th>
            <th>แผนก</th>
            <th>วันที่</th>
            <th>สถานะ</th>
            <th>การอนุมัติ</th>
        </tr>
    </thead>
    <?php $sql_o = 'SELECT * FROM mainbeg_tb,user_tb,branch_tb,dep_tb WHERE Mbeg_UserbID = UserID and UserBrah = BrahCode and UserDep = DepID and MbegStatus = 0';
        $rso = mysql_query($sql_o) or die(mysql_error()); ?>
    <tbody>
        <?php while($rowo = mysql_fetch_array($rso)){ ?>
        <tr>
            <td><?php echo ++$i; ?></td>
            <td><?php echo $rowo['MbegCode']; ?></td>
            <td><?php echo $rowo['UserFname'],' ',$rowo['UserLname']; ?></td>
            <td><?php echo $rowo['BrahName']; ?></td>
            <td><?php echo $rowo['DepName']; ?></td>
            <td>
                <?php   if($rowo['MbegStatus'] == 0){
                            echo "ยังไม่อนุมัติ";
                        }elseif($rowo['MbegStatus'] == 1){
                            echo "อนุมัติแล้ว";
                        }elseif ($rowo['MbegStatus'] == 3) {
                            echo "ไม่อนุมัติ";
                        } ?>
            </td>
            <td><?php echo $rowo['MbegDate']; ?></td>
            <td> 
            <?php if($rowo['Mbeg_UserbID'] != $_SESSION['ssUserID']){ ?>
            <button type="button" class="btn btn-xs btn-primary" onclick="javascript:begconf(<?=$rowo['MbegID']?>);" ><span class="fa fa-eye" ></span> View </button>
            <?php } ?>
            <button type="button" class="btn btn-xs btn-danger" onclick="javascript:befdel(<?=$rowo['MbegID']?>);" ><span class="fa fa-trash" ></span> ลบ </button>
             </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<script>
$("#begstock").DataTable({
    "lengthMenu": [[20, 40, 60, -1], [20, 40, 60, "All"]]
});
</script>