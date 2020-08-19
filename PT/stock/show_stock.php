<?php session_start(); 
include '../js/conn.php';?>
<div class="page-title">
    <div class="title_left">
     <h3>Stock List <small>รายการคลัง</small></h3>
         </div>
    </div>
<div class="row">
 <div class="col-md-12">
    <div class="x_panel">
     <div class="x_title">
        <h2>รายการคลัง</h2>
       <div class="clearfix"></div>
     </div>
     <div class="x_content">
    <table class="table table-striped table-bordered" id="stock">
            <thead>
                 <tr>
                    <th>รหัส</th>
                    <th>สินทรัพท์</th>
                    <th>หมวด</th>
                    <th>ประเภท</th>
                    <th>ยี่ห่อ</th>
                    <th></th>
                    <th>ชื่อ</th>
                    <th>หน่วย</th>
                    <th>คงเหลือ</th>
                    <th>บันทึกรายการ/ตั้งค่า</th>
                 </tr>
                </thead>
                <?php $sql_stockS = 'SELECT * FROM stock_tb,product_tb,groupeq_tb,typeeq_tb,equip_tb WHERE Stk_ProdID = ProdID and  Prod_Group = GeqID and Prod_Type = TeqID and Prod_Brand = EquipID'; 
                      $objstockS = mysql_query($sql_stockS)?>
                <tbody>
                    <?php while ($row = mysql_fetch_array($objstockS)) { 
                           $id= $row['StkID'];
                           $stkid = $row['Stk_ProdID'];
                           if($row['Prod_GuoPro']==606){$guopro = "สินทรัพย์";}else{$guopro = "สิ้นเปลือง";}
                           $group = $row['GeqName'];
                           $type = $row['TeqName'];
                           $brand = $row['EquipName'];
                           $number = $row['ProdNumber'];
                           $name = $row['ProdName'];
                           $unit = $row['StkUnit'];
                           $totalnow = $row['StkTotalNow'];
                           $minimum = $row['StkMinimum'];
                           $codec = $row['Prod_GuoPro'];
                           $codeg = $row['GeqCode'];
                           $codet = $row['TeqCode'];
                           $codee = $row['EquipCode'];
                           $codep = $row['ProdNumber'];
                    ?>
                     <tr>
                        <td><?php echo $codec,$codeg,$codet,$codee,$codep; ?></td>
                        <td><?php echo $guopro;?></td>
                        <td><?php echo $group;?></td>
                        <td><?php echo $type;?></td>
                        <td><?php echo $brand;?></td>
                        <td><?php echo $number;?></td>
                        <td style="width: 30%"><?php echo $name;?></td>
                        <td><?php echo $unit;?></td>
                        <?php if($totalnow <= 1) { ?>
                        <td style="background-color : #ff4d4d; color : White;"><?php echo $totalnow;?></td>
                        <?php }else { ?>
                            <?php if($totalnow <= $minimum) { ?>
                                <td style="background-color :#ffa64d; color : black;"><?php echo $totalnow;?></td>
                                <?php }else { ?>
                                <td><?php echo $totalnow;?></td>
                                <?php } ?>
                        <?php } ?>
                        <td> 
                            <a href="javascript:view_stock(<?=$stkid?>);" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            <a href="javascript:ministk(<?=$id?>,<?=$stkid?>);" class="btn btn-default btn-xs"><i class="fa fa-cog"></i> ขั้นต้ำ</a>
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
$(function() {
      $("#stock").DataTable({
        "lengthMenu": [[20, 40, 60, -1], [20, 40, 60, "All"]]
      });
    });
</script>