<?php session_start();
include '../js/conn.php';

$sql_pov = 'SELECT * FROM po_tb,branch_tb,supply_tb,user_tb WHERE Po_UserID = UserID and Po_BrahID = BrahID and Po_SupID = SupID and PoID = "'.$_POST['id'].'"'; 
$objpov = mysql_query($sql_pov);

while ($rowpov = mysql_fetch_array($objpov)) { ?>
<section class="content invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12 invoice-header">
            <h1>
                <i class="fa fa-globe"></i> ใบสั่งซื้อ/PURCHASE ORDER
                <small class="pull-right"><?php echo $rowpov['PoDate'];?></small>
            </h1>
        </div>
    <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong><?php 
                if ($rowpov['PoComp'] == 1) {
                echo "บริษัท ยงเฮ้าส์ จำกัด";
                }else {
                echo "บริษัท ยงคอนกรีต จำกัด";
                }?></strong><br>
                <?php echo $rowpov['BrahAddress'];?>
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            To
            <address>
                <strong><?php echo $rowpov['SupName'];?></strong>
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>เล่มที่:</b> <?php echo $rowpov['PoBook'];?>
            <br>
            <br>
            <b>เลขที่:</b> <?php echo $rowpov['PoBook'],$rowpov['PoNumber'];?>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>รายการ</th>
                        <th>จำนวน</th>
                        <th>หน่วย</th>
                        <th>ราคา</th>
                        <th>ส่วนลด</th>
                        <th>รวม</th>
                    </tr>
                </thead>
                <?php $sql_listv ='SELECT * FROM list_tb,product_tb WHERE List_PoID = "'.$rowpov['PoID'].'" and List_ProdID = ProdID ';
                      $objlistv = mysql_query($sql_listv);
                      ?>
                <tbody>
                    <?php while ($rowtv = mysql_fetch_array($objlistv)) { ?>
                    <tr>
                        <td><?php echo ++$i;?> </td>
                        <td style="width: 50%"><?php echo $rowtv['ProdName'];?></td>
                        <td><?php echo $rowtv['ListTotal'];?></td>
                        <td><?php echo $rowtv['ListUnit'];?></td>
                        <td><?php echo $rowtv['ListPrice'];?></td>
                        <td><?php echo $rowtv['ListDiscount'];?></td>
                        <td><?php echo $rowtv['ListPriceTotal'];?></td>
                    </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
    <!-- accepted payments column -->
        <div class="col-xs-6">
            <label for="">หมายเหตุ</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                <?php echo wordwrap($rowpov['PoDetail'],100,"<br>",true);?>          
            </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
            <p class="lead">ยอดรวมทั้งหมด(บาท)</p>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">ราคารวม:</th>
                            <td><?php echo $rowpov['PoPriceAll'];?></td>
                        </tr>
                        <tr>
                            <th>ราคาไม่รวมภาษี:</th>
                            <td><?php echo $rowpov['PoPriceNvat'];?></td>
                        </tr>
                        <tr>
                            <th>ภาษีมูลค่าเพิ่ม (7%):</th>
                            <td><?php echo $rowpov['PoVat'];?></td>
                        </tr>
                        <tr>
                            <th>รวมทั้งสิ้น:</th>
                            <td><?php echo $rowpov['PoPriceTotal'];?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- foot row -->
    <div class="row">
        <div class="col-sm-4">
            <center>
            <br>
                <?php echo $rowpov['UserFname'],' ',$rowpov['UserLname'];?><br>
                .................................... <br>
                <h4>คุณ<?php echo $rowpov['UserFname'],' ',$rowpov['UserLname'];?></h4>
                <strong><h4>ผู้สั่งซื้อ</b4></strong>
                
            </center>
        </div>
        <!-- /.col -->
        <div class="col-sm-4">
        <center>
        <br>
        <?php echo $rowpov['PoApproveUser'];?><br>
                .................................... <br>
            <h4>คุณเอกราช ปิ่นเงิน</h4>
            <strong><h4>ผู้จัดการฝ่าย</b4></strong>
        </center>
        </div>
        <!-- /.col -->
        <div class="col-sm-4">
        <?php if($rowpov['PoPriceTotal'] >= 5000.00){ ?>
        <center>
        <br>
            .................................... <br>
            <h4>คุณสรรเพรญ ศลิษฏ์อรรถกร</h4>
            <h4>กรรมการผู้จัดการ</h4>
            <strong><h4>ผู้อนุมัติสั่งซื้อ</b4></strong>
        </center>
        <?php  } ?>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
                        <br>
    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <button class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="javascript:prtdf(<?=$rowpov['PoID']?>);" ><i class="fa fa-download"></i> Generate PDF</button>
        </div>
    </div>
</section>

<?php  } ?>