<?php session_start();
include '../js/conn.php'; 
$sql= 'SELECT * FROM product_tb WHERE ProdID = "'.$_POST['id'].'"';
$rs = mysql_query($sql) or die(mysql_error());
$rw = mysql_fetch_array($rs);
?>

<center><h4>VIEW STOCK <small><?php echo $rw['ProdName']; ?></small></h4></center>
<hr>
<div class="row">
    <div class="col-md-12"><!-- COL -->
    <div class="panel panel-default"><!--panel-->
    <div class="panel-body"><!--panel body-->
    <center><h4>บันทึกการนำเข้า</h4></center>
    <hr>
        <table class="table" id="imst">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>PO</th>
                    <th>วันที่นำเข้า</th>
                    <th>จำนวน</th>
                    <th>ผู้นำเข้า</th>
                    <th>หมายเหตุ</th>
                </tr>
            </thead>
            <tbody>
                <?php $sql_vik = 'SELECT * FROM instock_tb WHERE Isk_ProdID = "'.$_POST['id'].'"';
                    $rsvik = mysql_query($sql_vik) or die(mysql_error()); ?>
                <?php while ($rowvik = mysql_fetch_array($rsvik)) { ?>
                <tr>
                    <td><?php echo ++$i; ?></td>
                    <?php $sql_p = 'SELECT * FROM po_tb WHERE PoID = "'.$rowvik['Isk_PoID'].'" ';
                        $rsp = mysql_query($sql_p) or die(mysql_error()); 
                        $rowp = mysql_fetch_array($rsp);?>
                    <td><?php echo $rowp['PoBook'],$rowp['PoNumber'];?></td>
                    <td><?php echo $rowvik['IskDateTime']; ?></td>
                    <td><?php echo $rowvik['IskTotal']; ?></td>
                    <th><?php echo $rowvik['IskInUser']; ?></th>
                    <th><?php echo $rowvik['IskDetail']; ?></th>
                </tr>
                <?php } ?>
            </tbody>  
        </table>
    </div><!--panel body-->
    </div><!--panel-->
    </div><!--Col-->
    </div>
    <div class="row">
    <div class="col-md-12"><!--Col-->
    <div class="panel panel-default"><!--panel-->
    <div class="panel-body"><!--panel body-->
    <center><h4>บันทึกการเบิก</h4></center>
    <hr>
        <table class="table" id="oust">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>วันที่นำออก</th>
                    <th>จำนวน</th>
                    <th>ผู้เบิกออก</th>
                    <th>หมายเหตุ</th>
                </tr>
            </thead>
            <tbody>
            <?php $sql_vio = 'SELECT * FROM mainbeglist_tb,mainbeg_tb,user_tb WHERE Mblist_ProdID = "'.$_POST['id'].'" and MbegID = Mblist_MbegID and Mbeg_UserbID = UserID and MbegStatus = 1 ';
                $rsvio = mysql_query($sql_vio) or die(mysql_error()); ?>
                <?php while($row = mysql_fetch_array($rsvio)){ ?>
                <tr>
                    <th><?php echo ++$i2; ?></th>
                    <th><?php echo $row['MbegDateConf']; ?></th>
                    <th><?php echo $row['MblistTotle']; ?></th>
                    <th><a href="javascript:vpb(<?=$row['UserID']?>);"><?php echo $row['UserFname'],' ',$row['UserLname']; ?></a></th>
                    <th><?php echo $row['MblistDetail']; ?></th>
                </tr>
                <?php } ?>
            </tbody>  
        </table>
    </div><!--panel body-->
    </div><!--panel-->
    </div><!--col-->
</div>
<script>
    $("#imst").DataTable();
    $("#oust").DataTable();
</script>