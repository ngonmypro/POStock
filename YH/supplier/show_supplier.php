<?php session_start(); 
include '../js/conn.php';?>
<div class="page-title">
    <div class="title_left">
     <h3>Product List <small>รายการสินค้า</small></h3>
         </div>
    </div>
<div class="row">
 <div class="col-md-12">
    <div class="x_panel">
     <div class="x_title">
        <h2>รายการสินค้า</h2>
       <div class="clearfix"></div>
     </div>
     <div class="x_content">
     <table class="table table-striped table-bordered" id="product">
    <thead>
        <tr>
            <th>ชื่อซับพลาย</th>
            <th>แก้ไข/ลบ</th>
        </tr>
    </thead>
    <?php   $sql_prodS = 'SELECT * FROM supply_tb'; 
            $objprodS = mysql_query($sql_prodS); ?>
    <tbody>
        <?php while ($row = mysql_fetch_array($objprodS)) { 
               $supid = $row['SupID'];
               $supname = $row['SupName'];
        ?>
        <tr>
            <td><?php echo $supname; ?></td>
            <td> 
                <a href="javascript:edsup_btn(<?=$supid?>);" class="btn btn-info btn-xs" ><i class="fa fa-pencil"></i> Edit </a> 
                <a href="javascript:delsup_btn(<?=$supid?>,'<?=$supname?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
            </td>
        </tr>
        <?php }mysql_close($c);?>
    </tbody>
</table>
     </div>
</div>
</div>
</div>
<script>
$("#product").DataTable({
    "lengthMenu": [[20, 40, 60, -1], [20, 40, 60, "All"]]
});
</script>