<?php session_start(); 
include '../js/conn.php';?>
<table class="table table-striped table-bordered" id="product">
    <thead>
        <tr>
            <th>รหัส</th>
            <th>สินทรัพท์</th>
            <th>หมวด</th>
            <th>ประเภท</th>
            <th>ยี่ห่อ</th>
            <th></th>
            <th>ชื่อ</th>
            <th>แก้ไข/ลบ</th>
        </tr>
    </thead>
    <?php   $sql_prodS = 'SELECT * FROM product_tb,groupeq_tb,typeeq_tb,equip_tb WHERE Prod_Group = GeqID and Prod_Type = TeqID and Prod_Brand = EquipID '; 
            if ($_POST['pdl'] == 606) {
            $sql_prodS.= ' and Prod_GuoPro = 606  '; 
            }
            if ($_POST['pdl'] == 607) {
                $sql_prodS.= ' and Prod_GuoPro = 607  ';   
                }
            $objprodS = mysql_query($sql_prodS); ?>
    <tbody>
        <?php while ($row = mysql_fetch_array($objprodS)) { 
               $productid = $row['ProdID'];
               if($row['Prod_GuoPro']==606){$guopro = "สินทรัพย์";}else{$guopro = "สิ้นเปลือง";}
               $prodid = $row['Prod_GuoPro'];
               $group = $row['GeqName'];
               $groupid = $row['GeqCode'];
               $type = $row['TeqName'];
               $typeid = $row['TeqCode'];
               $brand = $row['EquipName'];
               $brandid = $row['EquipCode'];
               $number = $row['ProdNumber'];
               $name = $row['ProdName'];
        ?>
        <tr>
            <td><?php echo $prodid,$groupid,$typeid,$brandid,$number; ?></td>
            <td><?php echo $guopro;?></td>
            <td><?php echo $group;?></td>
            <td><?php echo $type;?></td>
            <td><?php echo $brand;?></td>
            <td><?php echo $number;?></td>
            <td style="width: 30%"><?php echo $name;?></td>
            <td> 
                <a href="javascript:btn_edit_product(<?=$productid?>);" class="btn btn-info btn-xs" ><i class="fa fa-pencil"></i> Edit </a> 
                <a href="javascript:btn_delete_product(<?=$productid?>,'<?=$name?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
            </td>
        </tr>
        <?php }mysql_close($c);?>
    </tbody>
</table>

<script>
    $("#product").DataTable({
        "lengthMenu": [[20, 40, 60, -1], [20, 40, 60, "All"]]
    });
</script>