<?php session_start();
include '../js/conn.php';
?>
<table class="table table-bordered table-striped" id="adjst">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>จำนวนเก่า</th>
            <th>จำนวนใหม่</th>
            <th>วันที่แก้ไข</th>
            <th>ผู้แก้ไข</th>
        </tr>
    </thead>
    <?php $sql = 'SELECT * FROM adjust_tb WHERE Adj_StkID = "'.$_POST['id'].'" ';
        $rs = mysql_query($sql) or die(mysql_error()); ?>
    <tbody>
        <?php while($rw = mysql_fetch_array($rs)) { ?>
        <tr>
            <td><?php echo ++$i; ?></td>
            <td><?php echo $rw['Adj_StkOldTotal']; ?></td>
            <td><?php echo $rw['Adj_StkNewTotal']; ?></td>
            <td><?php echo $rw['AdjEditDate']; ?></td>
            <td><?php echo $rw['AdjEditUser']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>