<?php session_start();
include '../js/conn.php';

$sql_pov = 'SELECT * FROM po_tb,branch_tb,supply_tb WHERE Po_BrahID = BrahID and Po_SupID = SupID and PoID = "'.$_POST['id'].'"'; 
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
                } ?></strong><br>
                <?php $sql_bpo = 'SELECT * FROM branch_tb';
                $resultbpo = mysql_query($sql_bpo);?>
                <select class="form-control" id="brahpo">
                    <?php while ($row1 = mysql_fetch_array($resultbpo)) { ?>
                        <option value="<?php echo $row1['BrahID'];?>" <?php if($rowpov['Po_BrahID'] == $row1['BrahID'] ){ echo "selected"; } ?> >สาขา <?php echo $row1['BrahCode'];?></option>
                  <?php  }?>
                </select>
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            To
            <address>
            <?php $sql_spo = 'SELECT * FROM supply_tb';
              $resultspo = mysql_query($sql_spo);?>
            <select class="form-control" id="suppo">
            <?php while ($row2 = mysql_fetch_array($resultspo)) { ?>
            <option value="<?php echo $row2['SupID'];?>" <?php if($rowpov['Po_SupID'] == $row2['SupID'] ){ echo "selected"; } ?>><?php echo $row2['SupName'];?></option>
            <?php  }?>
            </select>
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
        <button type="button" class="btn btn-xs btn-primary" onclick="javascript:addlist2(1,<?=$rowpov['PoID']?>);">เพื่มรายการ</button>
        <div id="tableedit" ></div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
    <!-- accepted payments column -->
        <div class="col-xs-6">
            <label for="">หมายเหตุ</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            <textarea class="form-control" id="poeddet" cols="10" rows="5"><?php echo $rowpov['PoDetail']; ?></textarea>        
            </p>
            <div class="col-md-6">
                                  <?php $sql_apr = 'SELECT * FROM apprname_tb ';
                                        $rs = mysql_query($sql_apr) or die(mysql_error()); ?>
                                  <select class="form-control" id="apprnaed">
                                    <option value="">--- -- ผู้อนุมัติ -- ---</option>
                                    <?php while($row4 = mysql_fetch_array($rs)){?>
                                      <option value="<?php echo $row4['ApprID']; ?>" <?php if($row4['ApprID'] == $rowpov['PoApprName']){ echo "selected"; } ?>><?php echo $row4['ApprName'],' / ',$row4['ApprPosition']; ?></option>
                                    <?php } ?>
                                  </select>
                          </div>
                          <div class="col-md-6">
                                      <select class="form-control" id="stoinoted">
                                        <option value="">--- นำเข้าสต็อกหรือไม่นำเข้า ---</option>
                                        <option value="0"   <?php if($rowpov['PoImStock'] == 0) { echo "selected"; } ?>>นำเข้าสต็อก</option>
                                        <option value="1" <?php if($rowpov['PoImStock'] == 1) { echo "selected"; } ?>>ไม่นำเข้าสต็อก</option>
                                      </select>
                          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
            <p class="lead">ยอดรวมทั้งหมด(บาท)</p>
            <a class="btn btn-sm btn-primary" href="javascript:calnvat();" role="button">คำนวณไม่รวมภาษี</a>
            <a class="btn btn-sm btn-primary" href="javascript:calvat();" role="button">คำนวณรวมภาษี</a>
            <button type="button" class="btn btn-default" onclick="javascript:calnovat();">ราคาสินค้าไม่มีภาษี</button>
            <?php $sql = 'SELECT sum(ListPriceTotal) as tp FROM  list_tb  WHERE List_PoID = "'.$rowpov['PoID'].'" ';
                    $rs = mysql_query($sql) or die(mysql_error()); 
                    $row = mysql_fetch_array($rs);?>
            <script>
            function calvat() {
                //alert("test");
                var suma = <?php echo $row['tp'];?>;
                var nvat = suma;
                nvat *= 100;
                nvat /= 107;
                var nvatf = accounting.toFixed(nvat, 2)
                var vat = suma;
                vat -= nvat;
                //vat *= 7;
                //vat /= 100;
                var vatf = accounting.toFixed(vat, 2)
                //alert(vat);
                var sumto = 0;
                sumto = nvat + vat;
                $("#sumpaee").val(suma);
                $("#sumnvatee").val(nvatf);
                $("#sumvatee").val(vatf);
                $("#sumtotalee").val(sumto);
            }
            function calnvat() {
                var suma1 = <?php echo $row['tp'];?>;
                var suma1f = accounting.toFixed(suma1, 2)
                var vat1 = suma1;
                //vat -= nvat;
                vat1 *= 7;
                vat1 /= 100;
                var vatf1 = accounting.toFixed(vat1, 2)
                //alert(vat);
                var sumto1 = 0;
                sumto1 = suma1 + vat1;
                var sumto1f = accounting.toFixed(sumto1)
                $("#sumpaee").val(suma1);
                $("#sumnvatee").val(suma1f);
                $("#sumvatee").val(vatf1);
                $("#sumtotalee").val(sumto1f);
            }
            function calnovat() {
  var suma2 = <?php echo $row['tp'];?>;
  var sumto1ff = accounting.toFixed(suma2, 2)
  $("#sumpaee").val(suma2);
  $("#sumnvatee").val(suma2);
  $("#sumvatee").val('0.00');
  $("#sumtotalee").val(sumto1ff);
}
            </script>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">ราคารวม:</th>
                            <td><input type="text" class="form-control" id="sumpaee" readonly value="<?php echo $rowpov['PoPriceAll'];?>"></td>
                        </tr>
                        <tr>
                            <th>ราคาไม่รวมภาษี:</th>
                            <td><input type="text" class="form-control" id="sumnvatee" readonly value="<?php echo $rowpov['PoPriceNvat'];?>"></td>
                        </tr>
                        <tr>
                            <th>ภาษีมูลค่าเพิ่ม (7%):</th>
                            <td><input type="text" class="form-control" id="sumvatee" readonly value="<?php echo $rowpov['PoVat'];?>"></td>
                        </tr>
                        <tr>
                            <th>รวมทั้งสิ้น:</th>
                            <td><input type="text" class="form-control" id="sumtotalee" readonly value="<?php echo $rowpov['PoPriceTotal'];?>"></td>
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
       
        <!-- /.col -->
    </div>
    <!-- /.row -->
                        <br>
    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <button class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="javascript:edposave(<?=$rowpov['PoID']?>);" ><i class="fa fa-download"></i> Save</button>
        </div>
    </div>
</section>
        <?php } ?>
<script>
var id = "<?php echo $_POST['id']; ?>";
$("#tableedit").load("po/table_edit_po.php",{ id : id });
</script>