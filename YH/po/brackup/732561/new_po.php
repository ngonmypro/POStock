<?php session_start(); 
include '../js/conn.php';
date_default_timezone_set("Asia/Bangkok");?>
<div class="page-title">
    <div class="title_left">
     <h3>NEW Purchase Order <small>รายการสังซื้อใหม่</small></h3>
         </div>
    </div>
<div class="row">
 <div class="col-md-12">
    <div class="x_panel">
     <div class="x_title">
        <h2>รายการสังซื้อ</h2>
       <div class="clearfix"></div>
     </div>
     <div class="x_content">
     <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                                          <i class="fa fa-globe"></i> Invoice.
                                          <small class="pull-right">วันที่: <?php echo Date("j F"),' ',Date("Y")+543;?></small>
                                      </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          From
                          <address>
                                <strong>
                                    <div class="col-sm-7 invoice-col">
                                    <select class="form-control" id="compo">
                                        <option value="1">บริษัท ยงเฮ้าส์ จำกัด</option>         
                                    </select>
                                    </div>
                                </strong>
                                <div class="col-sm-7 invoice-col">
                                    <?php $sql_bpo = 'SELECT * FROM branch_tb';
                                          $resultbpo = mysql_query($sql_bpo);?>
                                <select class="form-control" id="brahpo">
                                    <?php while ($row1 = mysql_fetch_array($resultbpo)) { ?>
                                        <option value="<?php echo $row1['BrahID'];?>">สาขา <?php echo $row1['BrahCode'];?></option>
                                  <?php  }?>
                                </select>
                                </div>
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          To
                            <address>
                                <strong>
                                    <div class="col-sm-7 invoice-col">
                                    <?php $sql_spo = 'SELECT * FROM supply_tb';
                                          $resultspo = mysql_query($sql_spo);?>
                                        <select class="form-control" id="suppo">
                                        <?php while ($row2 = mysql_fetch_array($resultspo)) { ?>
                                        <option value="<?php echo $row2['SupID'];?>"><?php echo $row2['SupName'];?></option>
                                        <?php  }?>
                                        </select>
                                    </div>
                                </strong>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <p><b>เลมที่: <? echo date("y")+43;?></b></p>
                          <?php $sql_npo = 'SELECT max(PoNumber) as pnumber FROM po_tb ';
                                $resultnpo = mysql_query($sql_npo) or die(mysql_error());?>
                                <?php while ($row3 = mysql_fetch_array($resultnpo)) { ?>
                                <?php $number1 = $row3['pnumber']; 
                                      $number2 = $number1 + 1;}?>
                          <p id="n2" ><b>เลขที่:</b> <? echo date("y")+43,$number2;?></p>
                          <div class="col-sm-5">
                          <select class="form-control" id="pochnum" onchange="javascript:chnum();">
                                <option value="1">เก็บเลขที่ PO</option>
                                <option value="2">ไม่เก็บเลขที่ PO</option>
                            </select>
                            </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div id="tbl" class="col-xs-12 table">
                          <button type="button" class="btn btn-info btn-xs" onclick="javascript:addlist();">+ เพิ่มรายการ</button>
                          <button type="button" class="btn btn-danger btn-xs" onclick="javascript:relist();">- ลบรายการ</button>
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
                              </tr>
                            </thead>
                            <tbody id="potb">
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
                           <textarea name="" id="detailpo" cols="10" rows="5" class="form-control"></textarea>
                          </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-6">
                          <p class="lead"><button type="button" class="btn btn-primary " onclick="javascript:calbtn_pvat();">คำนวณราคาสินค้าไม่มีภาษี</button>
                          <button type="button" class="btn btn-info " onclick="javascript:calbtn_vat();">คำนวณราคาสินค้ามีภาษี</button></p>
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                              <tr>
                                  <th style="width: 10%">ราคารวม:</th>
                                  <td style="width: 10%"><input type="text" class="form-control" id="sumpa" readonly></td>
                                </tr>
                                <tr>
                                  <th style="width: 10%">ราคาไม่รวมภาษี:</th>
                                  <td style="width: 10%"><input type="text" class="form-control" id="sumnvat" readonly></td>
                                </tr>
                                <tr>
                                  <th style="width: 10%">ภาษีมูลค่าเพิ่ม (7%)</th>
                                  <td style="width: 10%"><input type="text" class="form-control" id="sumvat" readonly></td>
                                </tr>
                                <tr>
                                  <th style="width: 10%">รวมทั้งสิ้น:</th>
                                  <td style="width: 10%"><input type="text" class="form-control" id="sumtotal" readonly></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-12">
                          <button class="btn btn-success pull-right" onclick="javascript:savepo();" ><i class="fa fa-floppy-o"></i> บันทึกใบสังซื้อ</button>
                        </div>
                      </div>
                    </section>
     </div>
</div>
</div>
</div>
<script>
var i = 1 ;

function chnum() {
  var num = $("#pochnum").val();
  if(num == 1){
    $("#n2").toggle();
  }else{
    $("#n2").hide();
  }
}

function addlist() {
  var al = "<tr id='r"+ i +"'>";
  al +=  "<td id='ln'>"+ i +"</td>";
  <?php $sql_pl='SELECT * FROM product_tb';
        $rspl = mysql_query($sql_pl) or die(mysql_error());?>
  al += '<td ><select class="selectpicker" data-live-search="true" id="item'+i+'" hidden>';
  al += '<option value="">-</option>';
        <?php while ($rowpl = mysql_fetch_array($rspl)) { ?>
  al += '<option value="<?php echo $rowpl['ProdID'];?>"><?php echo $rowpl['ProdName'];?></option>';
        <?php } ?>
  al += '</select></td>';
  al += '<td><input type="text" class="form-control" id="detailw'+i+'"></td>';
  al += '<td><input type="number" class="form-control" id="numb'+i+'" onKeyUp="keyup('+i+');"></td>';
  al += '<td><input type="text" class="form-control" id="unit'+i+'" value="Pcs."></td>';
  al += '<td><input type="number" class="form-control" id="prict'+i+'" onKeyUp="keyup('+i+');"></td>';
  al += '<td><input type="number" class="form-control" id="dis'+i+'" onKeyUp="keyup('+i+');" value="0"></td>';
  al += '<td><input type="number" class="form-control" id="ptotal'+i+'" onKeyUp="keyup('+i+');" readonly></td>';
  al += "</tr>";
  $("#potb").append(al);
  i+=1;

  $('.selectpicker').selectpicker({
        style: 'btn-default',
        size: 10
    });
}

function relist() {
  i-=1;
  if(i == 1){
    Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
    {
      msg: "ห้ามลบ"
    });
  }else{
    $("#r"+i).remove();
  }
}

function keyup(k) {
  var itnum = $("#numb"+k).val();
  var pr = $("#prict"+k).val();
  var dis = $("#dis"+k).val();
  //alert(itnum + pr + dis);
  if( itnum != '' && pr != ''){
     /* pr*=100;
      pr/=107;*/
       sum1 = itnum * pr;
       sum2 = sum1 - dis;
       //sum2.toFixed(2)
       var as = accounting.toFixed(sum2, 2);
      $("#ptotal"+k).val(as); 
  }
}

function calbtn_vat() {
  var suma = 0;
  //alert("test");
  var co = i;
  co-=1;
  //alert(co);
  for ( var a = 1 ; a <= co ; a++) {
    suma += parseFloat($("#ptotal"+a).val());
  }
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
  var sumto = accounting.toFixed(sumto, 2)
  $("#sumpa").val(suma);
  $("#sumnvat").val(nvatf);
  $("#sumvat").val(vatf);
  $("#sumtotal").val(sumto);
}

function calbtn_pvat() {
  var suma1 = 0;
  //alert("test");
  var co1 = i;
  co1-=1;
  //alert(co);
  for ( var a1 = 1 ; a1 <= co1 ; a1++) {
    suma1 += parseFloat($("#ptotal"+a1).val());
  }
  /*var nvat = suma;
  nvat *= 100;
  nvat /= 107;*/
  var suma1f = accounting.toFixed(suma1, 2)
  var vat1 = suma1;
  //vat -= nvat;
  vat1 *= 7;
  vat1 /= 100;
  var vatf1 = accounting.toFixed(vat1, 2)
  //alert(vat);
  var sumto1 = 0;
  sumto1 = suma1 + vat1;
  var sumto1f = accounting.toFixed(sumto1, 2)
  $("#sumpa").val(suma1);
  $("#sumnvat").val(suma1f);
  $("#sumvat").val(vatf1);
  $("#sumtotal").val(sumto1f);

}

function savepo() {
	var compo = $("#compo").val();
	var brahpo = $("#brahpo").val();
	var suppo = $("#suppo").val();
	var pochnum = $("#pochnum").val();
  var detailpo = $("#detailpo").val();
  var sumpa = $("#sumpa").val();
  var sumnvat = $("#sumnvat").val();
  var sumvat = $("#sumvat").val();
  var sumtotal = $("#sumtotal").val();

  var data = "compo=" + compo + "&brahpo=" + brahpo + "&suppo=" + suppo + "&pochnum=" + pochnum +"&detailpo=" + detailpo;
      data += "&sumpa=" + sumpa + "&sumnvat=" + sumnvat + "&sumvat=" + sumvat + "&sumtotal=" + sumtotal;
	//alert(data);
	//if(compo != '' && brahpo != '' && suppo != '' && pochnum != ''){
	$.ajax({
		type: "POST",
		url: "po/new_po_pro.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg == 'Y'){
        list_new();
        Lobibox.notify("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "บันทึกเรียบร้อย"
				});
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: 'main'+msg
				});
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//	
		}
	});
}

function list_new() {
  var it = i;
  //alert("i"+i);
  it -= 1;
  //alert("it" + it);
  var item = [];
  var detailw = [];
  var numb = [];
  var unit = [];
  var prict = [];
  var dis2 = [];
  var ptotal = []; 
  for (var li = 1; li <= it ; li++) {
    item[li]  = $("#item"+li).val();
    detailw[li] = $("#detailw"+li).val();
    numb[li]  = $("#numb"+li).val();
    unit[li]  = $("#unit"+li).val();
    prict[li]  = $("#prict"+li).val();
    dis2[li]  = $("#dis"+li).val();
    ptotal[li]  = $("#ptotal"+li).val();
  }
 /* for (var li2 = 1; li2 <= it ; li2++) {
    alert(item[li2]);
  }*/
  for (var li2 = 1; li2 <= it ; li2++) {
    data = "item=" + item[li2] + "&detailw=" + detailw[li2] + "&numb=" + numb[li2] + "&unit=" + unit[li2] + "&prict=" + prict[li2] + "&dis2=" + dis2[li2] + "&ptotal=" + ptotal[li2];
    //alert(data);
    $.ajax({
		type: "POST",
		url: "po/new_list_po.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
        $("#mainpage").load("po/show_po.php");
			}else{
				Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: 'list'+ msg
				});
			  }
		  }
    });
  }
}
</script>