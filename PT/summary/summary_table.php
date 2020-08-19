<?php include '../js/conn.php'; ?>
<table class="table table-striped table-bordered" id="product">
    <thead>
        <tr>
            <th>ประเภท</th>
            <th>สาขา</th>
            <th>PO</th>
            <th>สินค้า</th>
            <th>ราคา/unit</th>
            <th>จำนวน</th>
            <th>ราคารวม</th>
            <th>วันที่</th>
        </tr>
    </thead>
    <?php   $sql_prodS = 'SELECT * FROM list_tb,product_tb,po_tb,branch_tb WHERE Po_BrahID = BrahID and List_PoID = PoID and List_ProdID = ProdID';
            if($_POST['yearsum'] != 0){
                $sql_prodS.= ' and Date(PoDate) BETWEEN  "'.$_POST['yearsum'].'-1-1" and "'.$_POST['yearsum'].'-12-31" ';
            } 
            if($_POST['catesum'] != 0){
                $sql_prodS.= ' and Prod_GuoPro = "'.$_POST['catesum'].'" ';
            }
            if($_POST['brahsum'] != 0){
                $sql_prodS.= ' and Po_BrahID = "'.$_POST['brahsum'].'" ';
            }
            $objprodS = mysql_query($sql_prodS); ?>
    <tbody>
        <?php while ($row = mysql_fetch_array($objprodS)) { 
               $supid = $row['SupID'];
               $supname = $row['ProdName'].'<br>'.$row['ListDetail'];
        ?>
        <tr>
            <td><?php if($row['Prod_GuoPro'] == 606){ echo "สินทรัพท์"; }elseif($row['Prod_GuoPro'] == 607){ echo "สินเปลือง"; } ?></td>
            <td><?php echo $row['BrahName'],'/',$row['BrahCode'];?></td>
            <td><?php echo $row['PoBook'],$row['PoNumber']?></td>
            <td><?php echo $supname; ?></td>
            <td><?php echo $row['ListPrice']; ?></td>
            <td><?php echo $row['ListTotal']; ?></td>
            <td><?php echo $row['ListPriceTotal']; ?></td>
            <td><?php echo $row['PoDate']; ?></td>
        </tr>
        <?php }mysql_close($c);?>
    </tbody>
</table>
<script>
$("#product").DataTable({
    "lengthMenu": [[20, 40, 60, -1], [20, 40, 60, "All"]]
});
</script>