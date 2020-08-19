<?php include '../js/conn.php'; ?>

<table class="table table-bordered table-striped table-hover" id="table_upfile">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>ไฟล์</th>
            <th>วันที่อัพ</th>
            <th>ลบ</th>
        </tr>
    </thead>
    <tbody>
        <?php $sql = 'SELECT * FROM upfilepo_tb WHERE Upf_PoID = "'.$_POST['id'].'" '; 
            $rs = mysql_query($sql) or die(mysql_error());
            while($row = mysql_fetch_array($rs)){ ?>
        <tr>
            <td><?php echo ++$i; ?></td>
            <td><a href="../YH/uploaddocument/<?php echo $row['UpfName'];?>" target="_blank"><?php echo $row['UpfName'];?></a></td>
            <td><?php echo $row['UpfTime'];?></td>
            <td> <button type="button" class="btn btn-danger btn-xs" onclick="javascript:delfilepo(<?=$row['UpfID']?>,<?=$_POST['id']?>,'<?=$row['UpfName']?>');"><span class="fa fa-trash"></span> ลบ</button> </td>
        </tr>
            <?php } ?>
    </tbody>
</table>
<script>
$("#table_upfile").dataTable();
</script>