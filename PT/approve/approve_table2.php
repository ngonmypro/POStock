<?php session_start(); 
include '../js/conn.php';?>

<table class="table table-striped table-bordered" id="potb">
            <thead>
                 <tr>
                    <th>ลำดับ</th>
                    <th>เล่มที่</th>
                    <th>เลขที่ใบ</th>
                    <th>วันที่</th>
                    <th>บริษัท</th>
                    <th>สาขา</th>
                    <th>ซับพลาย</th>
                    <th>ราคา</th>
                    <th>สถานะ</th>
                    <th>แก้ไข/ลบ</th>
                 </tr>
                </thead>
                <?php $sql_userS = 'SELECT * FROM po_tb,branch_tb,supply_tb WHERE Po_BrahID = BrahID and Po_SupID = SupID and PoStatus = 2 '; 
                      $objuserS = mysql_query($sql_userS)?>
                <tbody>
                    <?php while ($row = mysql_fetch_array($objuserS)) { 
                           $poid = $row['PoID'];
                           $pobook = $row['PoBook'];
                           $ponum = $row['PoNumber'];
                           $podate = $row['PoDate'];
                           if ($row['PoComp']== 1) {
                            $pocop = "บริษัท ยงเฮ้าส์ จำกัด";
                           }else {  $pocop = "บริษัท ยงคอนกรีต จำกัด"; }
                           $pobrah = $row['BrahCode'];
                           $posup = $row['SupName'];
                           $popall = $row['PoPriceTotal'];
                           if ($row['PoStatus']== 1) {
                            $posta = "<span class='label label-warning' >รออนุมัติ</span>";
                           }elseif( $row['PoStatus']== 2) {  $posta = "<span class='label label-success' >อนุมัติ</span>"; } elseif($row['PoStatus'] == 3) {$posta = "<span class='label label-danger' >ไม่อนุมัติ</span>";}
                    ?>
                     <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php echo $pobook;?></td>
                        <td><?php echo $pobook,$ponum;?></td>
                        <td><?php echo $podate;?></td>
                        <td><?php echo $pocop;?></td>
                        <td><?php echo $pobrah;?></td>
                        <td><?php echo $posup;?></td>
                        <td><?php echo $popall;?></td>
                        <td><?php echo $posta;?></td> 
                        <td> 
                            <a href="javascript:view_po_apv(<?=$poid?>);" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                         </td>
                    </tr>
                   <?php }mysql_close($c);?>
                </tbody>
         </table>
         <script>
$("#potb").DataTable();
</script>