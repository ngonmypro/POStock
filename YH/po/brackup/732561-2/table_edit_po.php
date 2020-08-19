<?php session_start();
include '../js/conn.php';
?>
<table class="table table-striped">
<thead>
    <tr>
        <th>ลำดับ</th>
        <th>รายการ</th>
        <th style="width: 25%"></th>
        <th>จำนวน</th>
        <th>หน่วย</th>
        <th>ราคา</th>
        <th>ส่วนลด</th>
        <th>รวม</th>
        <th></th>
    </tr>
</thead>
<?php $sql_listv ='SELECT * FROM list_tb,product_tb WHERE List_PoID = "'.$_POST['id'].'" and List_ProdID = ProdID ';
        $objlistv = mysql_query($sql_listv);
        ?>
<tbody>
    <?php while ($rowtv = mysql_fetch_array($objlistv)) { ?>
    <tr>
        <td><?php echo ++$i;?> </td>
        <td><?php echo $rowtv['ProdName'];?></td>
        <td><?php echo $rowtv['ListDetail'];?></td>
        <td><?php echo $rowtv['ListTotal'];?></td>
        <td><?php echo $rowtv['ListUnit'];?></td>
        <td><?php echo $rowtv['ListPrice'];?></td>
        <td><?php echo $rowtv['ListDiscount'];?></td>
        <td><?php echo $rowtv['ListPriceTotal'];?></td>
        <td>
            <button type="button" class="btn btn-xs btn-warning" onclick="javascript:addlist(2,<?=$_POST['id']?>,<?=$rowtv['ListID']?>);">Edit</button>
            <button type="button" class="btn btn-xs btn-danger" onclick="javascript:dellist(<?=$_POST['id']?>,<?=$rowtv['ListID']?>,'<?=$rowtv['ProdName']?>');">Delete</button>
        </td>
    </tr>
    <?php  } ?>
    </tbody></table>