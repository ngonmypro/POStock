<?php session_start();
include '../js/conn.php';
?>

<?php $sql_vb = 'SELECT * FROM mainbeg_tb,user_tb,branch_tb,dep_tb,title_tb WHERE UserTitle = TitleID  and Mbeg_UserbID = UserID and UserBrah = BrahCode and UserDep = DepID and MbegID = "'.$_POST['id'].'" ';
$rsvb = mysql_query($sql_vb) or die(mysql_error()); 
 
while($rw = mysql_fetch_array($rsvb)){ ?>
<table class="table">
    <tr>
        <th>สถานะ : </th>
        <td>
        <?php if($rw['MbegStatus'] == 0){
            echo "ยังไม่อนุมัติ";
        }elseif($rw['MbegStatus'] == 1){
            echo "อนุมัติแล้ว";
        }elseif ($rw['MbegStatus'] == 3) {
            echo "ไม่อนุมัติ";
        } ?>
        </td>
    </tr>
    <tr>
        <th>วันที่ : </th>
        <td><?php echo $rw['MbegDate'],'/',$rw['MbegID']; ?> </td>
    </tr>
    <tr>
        <th>ชื่อ : </th>
        <td><?php echo $rw['TitleName'],$rw['UserFname'],' ',$rw['UserLname']; ?></td>
    </tr>
    <tr>
        <th>สาขา : </th>
        <td><?php echo $rw['BrahName']; ?></td>
    </tr>
    <tr>
        <th>แผนก : </th>
        <td><?php echo $rw['DepName']; ?></td>
    </tr>
</table>
<table class="table table-striped table-bordered" id="listhisb">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>รายการ</th>
            <th>จำนวน</th>
            <th>หมายเหตุ</th>
        </tr>
    </thead>
    <?php $sql_vb2 = 'SELECT * FROM mainbeglist_tb,product_tb WHERE Mblist_MbegID = "'.$rw['MbegID'].'" and  Mblist_ProdID = ProdID';
    $rsvb2 = mysql_query($sql_vb2) or die(mysql_error());  ?>
    <tbody>
    <?php   while($rw2 = mysql_fetch_array($rsvb2)){ ?>
        <tr>
            <td><?php echo ++$i; ?></td>
            <td><?php echo $rw2['ProdName']; ?></td>
            <td><?php echo $rw2['MblistTotle']; ?></td>
            <td><?php echo $rw2['MblistDetail']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php } ?>
<script>
$("#listhisb").DataTable();
</script>