<?php include '../js/conn.php';?>

<center><h4>ADD TO STOCK <small>From Old Stock</small></h4></center>
<button type="button" class="btn btn-info btn-xs" onclick="javascript:addlistst();">+ เพิ่มรายการ</button>
<button type="button" class="btn btn-danger btn-xs" onclick="javascript:relistst();">- ลบรายการ</button>
<table class="table table-striped">
    <thead>
        <tr>
          <th>ลำดับ</th>
          <th style="width: 50%">รายการ</th>
          <th>จำนวน</th>
          <th>หมายเหตุ</th>
        </tr>
    </thead>
    <tbody id="potb2">
    </tbody>
</table>
<hr>
<button type="button" class="btn btn-primary" onclick="javascript:addistock(i2);">Add Stock</button>
<Script>
var i2 = 1 ;
function addlistst() {
  var al = "<tr id='r"+ i2 +"'>";
  al +=  "<td id='ln'>"+ i2 +"</td>";
  <?php $sql_pl='SELECT * FROM product_tb ';
        $rspl = mysql_query($sql_pl) or die(mysql_error());?>
  al += '<td  style="width: 50%"><select class="selectpicker" id="item2'+i2+'" data-live-search="true"  hidden>';
  al += '<option value="">-</option>'
        <?php while ($rowpl = mysql_fetch_array($rspl)) { ?>
  al += '<option value="<?php echo $rowpl['ProdID'];?>" data-tokens="<?php echo $rowpl['ProdName'];?>"><?php echo $rowpl['ProdName'];?></option>'
        <?php } ?>
  al += '</select>'
  al += '</td>'
  al += '<td style="width: 15%"><input type="number" class="form-control" id="numb2'+i2+'" onKeyUp="keyup('+i2+');"></td>';
  al += '<td><input type="text" class="form-control" id="detail2'+i2+'" onKeyUp="keyup('+i2+');"></td>';
  al += "</tr>";
  $("#potb2").append(al);
  i2+=1;
  $('.selectpicker').selectpicker({
        style: 'btn-default',
        size: 10
    });
}

function relistst() {
  i2-=1;
  if(i2 == 1){
    Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
    {
      msg: "ห้ามลบ"
    });
  }else{
    $("#r"+i2).remove();
  }
}

</script>