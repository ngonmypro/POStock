<?php session_start();
include '../js/conn.php';
?>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th  style="width: 50%" >รายการ</th>
            <th>จำนวน</th>
            <th>หน่วย</th>
        </tr>
    </thead>
    <?php $sql_listv ='SELECT * FROM list_tb,product_tb WHERE List_PoID = "'.$_POST['id'].'" and List_ProdID = ProdID ';
        $objlistv = mysql_query($sql_listv) or die(mysql_error()); ?>  
    <tbody>
    <?php while ($rowvik = mysql_fetch_array($objlistv)) { ?>
        <tr>
            <td><?php echo ++$i;?></td>
            <td><?php echo $rowvik['ProdName'];?></td>
            <td><?php echo $rowvik['ListTotal'];?></td>
            <td><?php echo $rowvik['ListUnit'];?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>