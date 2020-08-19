<?php session_start();
include '../js/conn.php';
?>
<table class="table table-striped table-bordered" id="gtabk">
    <thead>
        <tr>
            <th style="width : 5%">ลำดับ</th>
            <th style="width : 50%">กลุ่ม</th>
            <th style="width : 20%">รายละเอียด/แก้ไข/ลบ</th>
        </tr>
    </thead>
    <?php $sql_gru = 'SELECT * FROM groupeq_tb ';
        if($_POST['id'] == 2){
            $sql_gru.= ' WHERE GeqCate = " 2 " ';
        }else{
            $sql_gru.= ' WHERE GeqCate = " 1 " ';
        } 
        $rsgru = mysql_query($sql_gru) or die(mysql_error());?>
    <tbody>
    <?php while ($rowgru = mysql_fetch_array($rsgru)) { ?>
        <tr>
            <td><?php echo  ++$i; ?></td>
            <td><?php echo  $rowgru['GeqName']; ?></td>
            <td> 
                <button type="button" class="btn btn-primary btn-xs" onclick="javascript:typeview(<?=$rowgru['GeqCode']?>,<?=$rowgru['GeqCate']?>,'<?=$rowgru['GeqName']?>')" > <span class="fa fa-eye" ></span> ประเภท</button>|
                <button type="button" class="btn btn-warning btn-xs" onclick="javascript:grued(<?=$rowgru['GeqID']?>,'<?=$rowgru['GeqName']?>','G');" > <span class="fa fa-pencil"></span> แก้ไข</button>| 
                <button type="button" class="btn btn-danger btn-xs" onclick="javascript:grudel('<?=$rowgru['GeqName']?>','G',<?=$rowgru['GeqCode']?>,<?=$rowgru['GeqCate']?>);"> <span class="fa fa-trash"></span> ลบ</button>          
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script>
    $(function() {
      $("#gtabk").DataTable();
    });
</script>